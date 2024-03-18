<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ComponentsSectionsEntertainmentItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EntertainmentComponent extends Model
{
    use HasFactory;
    protected $table = 'entertainments_components';
    protected $fillable = ['entity_id', 'component_id', 'component_type'];

    public function item()
    {
        //return $this->hasOne(ComponentSectionEntertainmentItem::class, 'component_id');
        return $this->belongsTo(ComponentsSectionsEntertainmentItem::class, 'component_id');
    }

    /**
     * Get the entertainment that owns the component.
     */
    // public function entertainment()
    // {
    //     return $this->belongsTo(Compo::class, 'entity_id');
    // }

    public function related()
    {
        return $this->morphTo();
    }

    
    /**
     * Get the entertainment item (section) associated with the component.
     */
    // public function entertainmentItem()
    // {
    //     return $this->hasOne(ComponentSectionEntertainmentItem::class, 'id', 'component_id');
    // }
}
