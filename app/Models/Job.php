<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = 'jobs_listings'; // Specify the actual table name
    protected $fillable = [
        'title',
        'body',
        'user_id', // The Poster who created the job
    ];

    // Scope to retrieve only active jobs (e.g., posted within last 2 months)
    public function scopeActive($query)
    {
        return $query->where('created_at', '>=', now()->subMonths(2));
    }

    // Relationship: A job belongs to a user (the poster)
    public function poster()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Many-to-many relationship with users that are interested in the job
    public function interestedUsers()
    {
        return $this->belongsToMany(User::class, 'interests')->withTimestamps();
    }
}
