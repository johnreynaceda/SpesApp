<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function passer()
    {
        return $this->hasOne(Passer::class);
    }

    public function student_applicants()
    {
        return $this->hasMany(StudentApplication::class);
    }
}
