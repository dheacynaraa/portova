<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $fillable = ['user_id', 'title', 'desc', 'tech_stacks',
                            'link_repo', 'link_demo',
                            'project_image', 'status'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }    

    public function likes() {
        return $this->hasMany(Like::class, 'project_id');
    }

    public function saves() {
        return $this->hasMany(Save::class, 'project_id');
    }
}
