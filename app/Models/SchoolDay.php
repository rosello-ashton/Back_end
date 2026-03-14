<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'type',
        'event_name',
        'total_students',
        'present_students',
        'absent_students',
        'attendance_rate',
    ];

    protected $casts = [
        'date' => 'date',
        'attendance_rate' => 'decimal:2',
    ];
}