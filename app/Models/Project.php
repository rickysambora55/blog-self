<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class, 'project_technologies')->withTimestamps();
    }
}
