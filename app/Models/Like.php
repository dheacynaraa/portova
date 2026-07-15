<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';
    protected $fillable = ['user_id', 'project_id'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function project() {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
