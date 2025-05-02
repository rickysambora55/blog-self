<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function technologies()
    {
        return $this->belongsToMany(Technology::class, 'profile_technologies')->withTimestamps();
    }
}
