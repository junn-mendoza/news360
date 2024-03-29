<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComponentsSectionsEntertainmentItem extends Model
{
    use HasFactory;
                        
    protected $table = 'components_sections_entertaintment_items';
    
     /**
     * Get the articles associated with the category.
     */
    public function entertainment()
    {
        return $this->belongsToMany(Entertainment::class, 'entertainments_components','entity_id','component_id');
    }

    /**
     * Get all of the files related to the article.
     */
    public function files()
    {
        return $this->belongsToMany(
            File::class, 
            'files_related_morphs',
            'related_id','file_id')
                ->where('related_type', 'sections.entertaintment-item');
       
    }

}
