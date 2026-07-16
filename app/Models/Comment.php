<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['users', 'projects', 'comment'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function project() {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
