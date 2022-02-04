<?php

namespace App\Models;

use App\Scopes\OrderByScope;
use App\Traits\OrderByTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes, OrderByTrait;
    protected $guarded = [];

    public $timestamps = true;

    public function grades(){
        return $this->hasMany(Grade::class);
    }

    public function section() {
        return $this->belongsTo(Section::class);
    }

    public function classroom() {
        return $this->belongsTo(Classroom::class);
    }

    public function year() {
        return $this->belongsTo(Year::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
