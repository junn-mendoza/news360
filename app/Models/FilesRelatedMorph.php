<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilesRelatedMorph extends Model
{
    use HasFactory;
    protected $table = 'files_related_morphs';

    public function file()
    {
        return $this->belongsTo(File::class, 'file_id');
    }

    public function related()
    {
        return $this->morphTo();
    }
}
