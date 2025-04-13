<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function scopeActive($query)
    {
        return $query->where('created_at', '>=', now()->subMonths(2));
    }
}
