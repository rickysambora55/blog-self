<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function technologies() {
        return $this->belongsToMany(Technology::class, 'profile_technologies')->withTimestamps();
    }
}