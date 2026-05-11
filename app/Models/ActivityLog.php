<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'activity',
        'description',
        'ip_address',
        'user_agent'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function log(string $activity, $description = null)
    {
        // Jangan catat aktivitas jika user adalah owner
        if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role === 'owner') {
            return null;
        }

        try {
            return self::create([
                'user_id' => \Illuminate\Support\Facades\Auth::id(),
                'activity' => $activity,
                'description' => $description,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Gagal mencatat log aktivitas: ' . $e->getMessage());
            return null;
        }
    }
}
