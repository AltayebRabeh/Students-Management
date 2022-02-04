<?php

namespace App\Models;

use App\Traits\OrderByTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory, OrderByTrait, SoftDeletes;
    protected $guarded = [];

    public $timestamps = true;

    public function students() {
        return $this->hasMany(Student::class);
    }

    public function teachers() {
        return $this->hasMany(Teacher::class);
    }

    public function grades() {
        return $this->hasMany(Grade::class);
    }

    public function subjectsTeachers() {
        return $this->hasMany(SubjectTeacher::class);
    }
}
