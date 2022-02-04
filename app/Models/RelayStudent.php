<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelayStudent extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = true;

    public function relayStudents()
    {
        return $this->belongsTo(Relay::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
