<?php

namespace App\Models;

use App\Traits\HasIdentify;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory, HasIdentify;

    protected $table = 'modules';

    protected $fillable = [
        'identify',
        'course_id',
        'name',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
