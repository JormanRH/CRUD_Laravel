<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['DNI', 'name', 'lastName','subject', 'grade1', 'grade2', 'grade3', 'finalGrade'];
}
