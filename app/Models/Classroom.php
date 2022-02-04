<?php

namespace App\Models;

use App\Traits\OrderByTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classroom extends Model
{
    use HasFactory, OrderByTrait;
    protected $guarded = [];

    public $timestamps = true;

    public function students() {
        return $this->hasMany(Student::class);
    }

    public function semesters() {
        return $this->hasMany(Semester::class);
    }

    public function subjectsTeachers() {
        return $this->hasMany(SubjectTeacher::class);
    }

    public function grades() {
        return $this->hasMany(Grade::class);
    }
}
