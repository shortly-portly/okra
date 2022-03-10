<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'start_date'       => 'date',
        'end_date'         => 'date',
        'next_review_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
