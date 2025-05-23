<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;

    protected $table = 'modules';

    protected $fillable = [
        'uuid',
        'course_id',
        'name',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
