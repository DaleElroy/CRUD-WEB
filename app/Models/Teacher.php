<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Teacher extends Model
{
    protected $fillable = ['teacher_name','teacher_age','teacher_address','teacher_department'];
    use HasFactory;
}
