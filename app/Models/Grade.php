<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $guarded = [];

    public $timestamps = true;

    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function section() {
        return $this->belongsTo(Section::class);
    }

    public function classroom() {
        return $this->belongsTo(Classroom::class);
    }

    public function semester() {
        return $this->belongsTo(Semester::class);
    }

    public function subjectTeacher() {
        return $this->belongsTo(SubjectTeacher::class);
    }

    public function year() {
        return $this->belongsTo(Year::class);
    }

    public function mark()
    {
        return $this->belongsTo(Mark::class);
    }
}
