<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mark extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public $timestamps = true;
    
    public function getGetFailAttribute($value)
    {
        return $this->fail == 1 ? 'نعم' : 'لا';
    }

    public function getGetCalculationAttribute($value)
    {
        return $this->calculation == 1 ? 'نعم' : 'لا';
    }

    public function setMarkAttribute($value)
    {
        $this->attributes['mark'] = Str::upper($value);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function equation()
    {
        return $this->belongsTo(Equation::class);
    }
}
