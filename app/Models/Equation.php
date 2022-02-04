<?php

namespace App\Models;

use App\Traits\OrderByTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equation extends Model
{
    use HasFactory, SoftDeletes, OrderByTrait;
    protected $guarded = [];

    public $timestamps = true;

    public function setFailsAttribute($value)
    {
        $this->attributes['Fails'] = $value == '' || $value == null ? 0 : $value;
    }

    public function marks()
    {
        return $this->hasMany(Mark::class);
    }
}
