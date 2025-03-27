<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    protected $fillable = ['name', 'filename', 'alt'];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_technologies')->withTimestamps();
    }
}