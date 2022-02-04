<?php

namespace App\Models;

use App\Traits\OrderByTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Year extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public $timestamps = true;

    public function students() {
        return $this->hasMany(Student::class);
    }

    public function subjectsTeachers() {
        return $this->hasMany(SubjectTeacher::class);
    }

    public function grades() {
        return $this->hasMany(Grade::class);
    }

}
