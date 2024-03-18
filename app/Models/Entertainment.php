<?php

namespace App\Models;


use App\Models\EntertainmentComponent;
use Illuminate\Database\Eloquent\Model;
use App\Models\ComponentsSectionsEntertainmentItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entertainment extends Model
{
    use HasFactory;

    //protected $table='entertainments';
    public function components()
    {
        return $this->hasMany(EntertainmentComponent::class, 'entity_id');
    }

    public function items()
    {
        return $this->belongsToMany(
            ComponentsSectionsEntertainmentItem::class, 
            'entertainments_components',
            'entity_id','component_id')
                ->where('component_type','sections.entertaintment-item');
       
    }
    public function files() {
        return $this->items()->with('files');
    }
}
