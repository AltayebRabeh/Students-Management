<?php

namespace App\Models;

use App\Traits\OrderByTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory, OrderByTrait, SoftDeletes;
    protected $guarded = [];

    public $timestamps = true;

    public function subjectTeachers() {
        return $this->hasMany(SubjectTeacher::class);
    }
}
