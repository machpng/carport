<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $guarded = [];

    public function getImageAttribute($value)
    {
        return explode(',', $value);
    }
}
