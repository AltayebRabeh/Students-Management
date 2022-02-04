<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubjectTeacher extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'subject_teacher';
    protected $guarded = [];

    public $timestamps = true;

    public function section() {
        return $this->belongsTo(Section::class);
    }

    public function subject() {
        return $this->belongsTo(Subject::class);
    }

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }

    public function classroom() {
        return $this->belongsTo(Classroom::class);
    }

    public function semester() {
        return $this->belongsTo(Semester::class);
    }

    public function year() {
        return $this->belongsTo(Year::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function grades() {
        return $this->hasMany(Grade::class);
    }
}
