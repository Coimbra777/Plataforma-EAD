<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{

    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'identify',
        'title',
        'description',
    ];

    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function (Course $course) {
    //         $course->identify = Str::uuid()->toString();
    //     });
    // }
}
