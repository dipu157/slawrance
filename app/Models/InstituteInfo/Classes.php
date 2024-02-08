<?php

namespace App\Models\InstituteInfo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $table= 'classes';

    protected $guarded = ['id', 'created_at','updated_at'];

    protected $fillable = [
        'class_teacher_name',
        'position',
        'photo',
        'class_name',
        'image',
        'student_age',
        'class_time',
        'capacity',
        'status',
        'user_id',
        
    ];
}
