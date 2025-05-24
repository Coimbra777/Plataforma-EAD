<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasIdentify
{
    /**
     * Boot the trait and attach the creating event listener.
     */
    protected static function bootHasIdentify()
    {
        static::creating(function ($model) {
            if (empty($model->identify)) {
                $model->identify = (string) Str::uuid();
            }
        });
    }
}
