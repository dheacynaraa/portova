<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'tech_stacks',
        'link_repo',
        'link_demo',
        'project_image',
        'status', // pending, approved, rejected
    ];

    protected $casts = [
        'tech_stacks' => 'array', // Jika tech_stacks disimpan sebagai JSON
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function saves()
    {
        return $this->hasMany(Save::class);
    }

    // Helper untuk cek apakah user sudah like
    public function isLikedBy($userId)
    {
        return $this->likes()->where('user_id', $userId)->exists();
    }

    // Helper untuk cek apakah user sudah save
    public function isSavedBy($userId)
    {
        return $this->saves()->where('user_id', $userId)->exists();
    }
}