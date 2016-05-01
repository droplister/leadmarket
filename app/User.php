<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'type', 'name', 'email', 'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function leads()
    {
        return $this->belongsToMany(Lead::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
