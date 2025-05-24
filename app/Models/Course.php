<?php

namespace App\Models;

use App\Traits\HasIdentify;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory, HasIdentify;

    protected $table = 'courses';

    protected $fillable = [
        'identify',
        'title',
        'description',
    ];

    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
