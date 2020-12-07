<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_recur_date',
        'end_recur_date',
        'start_time',
        'end_time',
        'day_of_week',
        'bg_color',
        'border_color'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
