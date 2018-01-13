<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parking extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function getImageAttribute($value)
    {
        return explode(',', $value);
    }

    public function parts()
    {
        return $this->hasMany(Part::class, 'park_id', 'id');
    }
}
