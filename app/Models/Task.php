<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'teacher_id', 'student_id', 'laba_id', 'parent_id','status', 'point', 'deadline'];
}
