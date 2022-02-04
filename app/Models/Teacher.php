<?php

namespace App\Models;

use App\Traits\OrderByTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory, OrderByTrait, SoftDeletes;
    protected $guarded = [];

    public $timestamps = true;

    public function section() {
        return $this->belongsTo(Section::class);
    }

    public function teacherSubjects() {
        return $this->hasMany(SubjectTeacher::class);
    }
}
