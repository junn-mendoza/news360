<?php 
namespace App\Repositories;

use App\Models\BannerSlider;
use App\Http\Resources\BannerSliderResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Banner extends Base 
{
    public function getDataResource(&$data, $page = 2): JsonResource
    {        
        $bannerSlider = BannerSlider::with([
            'components.files',
            'components.component'
            ])->findOrFail($page);

        return BannerSliderResource::make($bannerSlider);
    }
}