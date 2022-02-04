<?php

namespace App\Models;

use App\Traits\OrderByTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Semester extends Model
{
    use HasFactory, OrderByTrait;
    protected $guarded = [];

    public $timestamps = true;

    public function classroom() {
        return $this->belongsTo(Classroom::class);
    }

    public function subjectsTeachers() {
        return $this->hasMany(SubjectTeacher::class);
    }

    public function grades() {
        return $this->hasMany(Grade::class);
    }
}
