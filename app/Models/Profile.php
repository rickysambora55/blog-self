<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Profile extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $with = ['technologies'];

    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class, 'profile_technologies')->withTimestamps();
    }
}
