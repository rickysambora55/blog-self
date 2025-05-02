<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Technology extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_technologies')->withTimestamps();
    }

    public function profiles()
    {
        return $this->belongsToMany(Profile::class, 'profile_technologies')->withTimestamps();
    }
}
