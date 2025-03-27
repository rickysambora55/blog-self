<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'type', 'slug', 'description'];

    public function images() {
        return $this->hasMany(ProjectImage::class);
    }

    public function technologies() {
        return $this->belongsToMany(Technology::class, 'project_technologies')->withTimestamps();
    }
}