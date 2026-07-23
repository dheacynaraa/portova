<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // ===== STATUS CONSTANTS (sesuai database) =====
    const STATUS_PENDING = 'menunggu';
    const STATUS_APPROVED = 'disetujui';
    const STATUS_REJECTED = 'ditolak';

    protected $table = 'projects';

    protected $fillable = [
        'user_id',
        'title',
        'desc',
        'tech_stacks',
        'link_repo',
        'link_demo',
        'project_image',
        'status'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // ===== RELATIONS =====
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'project_id');
    }

    public function saves()
    {
        return $this->hasMany(Save::class, 'project_id');
    }

    // ===== SCOPES =====
    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    public function scopeApproved($query)
    {
        return $query->where('status', self::STATUS_APPROVED);
    }

    public function scopeRejected($query)
    {
        return $query->where('status', self::STATUS_REJECTED);
    }

    // ===== STATUS CHECK HELPERS =====
    public function isPending()
    {
        return $this->status === self::STATUS_PENDING;
    }

    public function isApproved()
    {
        return $this->status === self::STATUS_APPROVED;
    }

    public function isRejected()
    {
        return $this->status === self::STATUS_REJECTED;
    }

    // ===== ACCESSORS =====
    public function getStatusLabelAttribute()
    {
        return match ($this->status) {
            self::STATUS_PENDING => 'Menunggu',
            self::STATUS_APPROVED => 'Disetujui',
            self::STATUS_REJECTED => 'Ditolak',
            default => 'Tidak diketahui',
        };
    }

    public function getStatusBadgeColorAttribute()
    {
        return match ($this->status) {
            self::STATUS_PENDING => 'bg-amber-500/20 text-amber-400',
            self::STATUS_APPROVED => 'bg-emerald-500/20 text-emerald-400',
            self::STATUS_REJECTED => 'bg-red-500/20 text-red-400',
            default => 'bg-slate-500/20 text-slate-400',
        };
    }
}