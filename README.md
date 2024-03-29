<p align="center"><img src="https://i.ibb.co/5kTngVj/news360-logo.png" width="400" alt="News360 Logo"></p>

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Enhancing API Security with News360ApiKey Middleware in Laravel

This PHP middleware, News360ApiKey, serves to authenticate incoming requests by verifying the API key sent in the header (x-api-key) against the expected API key configured in the application, thereby preventing unauthorized access to protected resources. It returns a JSON response with an "Unauthorized" error and a status code of 401 if the API key doesn't match, ensuring robust protection against unauthorized access. Utilizing configuration for storing sensitive information like API keys, it implements a basic yet effective form of authentication. However, to bolster security, complementary measures such as secure transmission over HTTPS, input validation, rate limiting, and logging should be implemented, while staying vigilant against emerging threats and vulnerabilities.

```php
class News360ApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = $request->header('x-api-key');

        // Check if API key matches the expected value
        if ($apiKey !== config('news360key.api_key')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $next($request);
    }
}
```
### Router 
```php
Route::middleware('news360key')->group(function () {
        // Your routes here...
    Route::get('/main',[MainController::class, 'index']); 
    Route::get('/entertainment',[EntertainmentController::class, 'index']); 
    Route::get('/news',[NewsController::class, 'index']); 
    Route::get('/news/{slug}',[DetailController::class, 'index']); 
});
```
## Leveraging Laravel's Data Transfer Objects (DTOs) 

In this middleware streamlines the validation and manipulation of incoming request data. By encapsulating the request parameters into dedicated DTO classes, this approach enhances code readability, maintainability, and security. DTOs facilitate centralized validation logic, reducing the likelihood of injection attacks and ensuring consistent data integrity throughout the application. Additionally, DTOs enable clear documentation of expected input structures, aiding in API versioning and contract enforcement. This adoption of Laravel's DTOs strengthens the middleware's resilience against potential security vulnerabilities while promoting cleaner and more robust code architecture.

```php
<?php

namespace App\DataTransferObjects;

use Carbon\Carbon;
use App\Tools\Helper;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleDTO
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $slug,
        public readonly ?string $title,
        public readonly ?string $description,
        public readonly ?string $media,
        public readonly ?string $author,
        public readonly ?string $credit,
        public readonly ?string $url,
        public readonly ?string $content,
        public readonly ?string $timeString,
        public readonly ?bool $autoplay,
        public readonly ?bool $featured,
        public readonly ?bool $special,
        public readonly ?Carbon $date,
        public readonly ?Carbon $created_at,
        public readonly ?Carbon $updated_at,
        public readonly array $categories,
        public readonly array $files// Change this to Collection to handle multiple files
    ) {
    }

    public static function fromResource(JsonResource $resource, $categories, $files): self
    {
        return new self(
            id: $resource->id,
            slug: $resource->slug,
            title: $resource->title,
            description: $resource->description,
            media: $resource->media,
            author: $resource->author,
            credit: $resource->credit,
            url: $resource->url,
            content: $resource->content,
            timeString: Helper::updateTimeDifference($resource->date),
            autoplay: (bool) $resource->autoplay,
            featured: (bool) $resource->featured,
            special: (bool) $resource->special,
            date: Carbon::parse($resource->date),
            created_at: Carbon::parse($resource->created_at),
            updated_at: Carbon::parse($resource->updated_at),
            categories: $categories,
            files: $files
        );
    }

    // Implement toArray method from Arrayable interface
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'title' => $this->title,
            'description' => $this->description,
            'media' => $this->media,
            'author' => $this->author,
            'credit' => $this->credit,
            'url' => $this->url,
            'content' => $this->content,
            'timeString' => $this->timeString,
            'autoplay' => $this->autoplay,
            'featured' => $this->featured,
            'special' => $this->special,
            'date' => $this->date ? $this->date->toISOString() : null,
            'created_at' => $this->created_at ? $this->created_at->toISOString() : null,
            'updated_at' => $this->updated_at ? $this->updated_at->toISOString() : null,
            'categories' => $this->categories,
            'files' => $this->files
        ];
    }
}

```
## Utilizing Laravel's Service Providers 

To inject dependencies like ArticleService and BannerService into the MainController, several advantages are realized. Firstly, it enhances code readability and maintainability by centralizing the instantiation and configuration of services, making it easier to understand and modify the controller's behavior. Secondly, it promotes modularity and reusability, as services can be easily swapped or extended without altering the controller's implementation, facilitating rapid development and iteration. Thirdly, this approach improves testability by enabling the injection of mock or stub implementations during unit testing, ensuring the controller's functionality can be thoroughly tested in isolation. Overall, leveraging Laravel's Service Providers enhances the scalability, flexibility, and robustness of the application's architecture.

```php
    public function __construct(
        ArticleService $articleService,
    
    )
    {
        $this->articleService = $articleService;
    }
    public function index() 
    {
        //code here
    }
```
### Service Provider
```php
class ArticleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind('ArticleService', function ($app) {
            return new ArticleService();
        });
    }
```

## Adding Scope to the Model
```php
    public function scopeByDemand(Builder $query, array $excludedArticleIds = [], $includedCategory = null)
    {
        $query = $query->selectRaw('*, DENSE_RANK() OVER (PARTITION BY category_id ORDER BY article_id DESC) AS rank')
            ->whereNotIn('article_id', $excludedArticleIds);

        if($includedCategory) {
            $query->whereIn('category_id', $includedCategory);
        }    
        
        $query->orderBy('rank')
            ->orderBy('category_id')
            ->orderBy('article_id', 'desc');
        return $query;
    }
```

## Exploring Laravel's hasManyThrough Relationship for File Retrieval

The files() function defines a relationship in Laravel's Eloquent ORM, establishing a "has many through" relationship between the current model (presumably a model representing sections) and the File model. This relationship is mediated through the FilesRelatedMorph pivot model, using related_id and component_id as intermediate keys. Additionally, it filters the related files based on the related_type column in the pivot table, ensuring that only files associated with sections under the "bannerslideritem" type are retrieved. This code facilitates the retrieval of files related to specific sections within the context of a banner slider item, enabling efficient querying and manipulation of related data within the application.

```php
    public function files()
    {
        return $this->hasManyThrough(File::class, FilesRelatedMorph::class, 'related_id', 'id', 'component_id', 'file_id')
            ->where('files_related_morphs.related_type', 'sections.bannerslideritem');
           
    }
```
## Dynamic File Association: Leveraging Polymorphism in Laravel MorphMany Relationships

In the given code, the files() function exemplifies the use of polymorphic relationships in Laravel's Eloquent ORM through the morphMany() method. This method establishes a one-to-many polymorphic relationship between the current model and the FilesRelatedMorph model. Here, the 'related' parameter specifies the polymorphic type, allowing the association of files with diverse types of models. By employing polymorphism, this approach fosters flexibility and extensibility within the application, enabling seamless integration of file-related functionalities across various model types without the need for separate relationships.

```php
    public function files()
    {
        return $this->hasManyThrough(File::class, FilesRelatedMorph::class, 'related_id', 'id', 'component_id', 'file_id')
            ->where('files_related_morphs.related_type', 'sections.bannerslideritem');
           
    }
```