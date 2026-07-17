<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'role', 'image_profile', 
                            'university', 'link_instagram',
                            'link_github', 'bio'];
    protected $hidden = ['password'];

    public function projects () {
        return $this->hasMany(Project::class, 'user_id');
    }

    public function likes () {
        return $this->hasMany(Like::class, 'user_id');
    }

    public function saves() {
        return $this->hasMany(Save::class, 'user_id');
    }
}
