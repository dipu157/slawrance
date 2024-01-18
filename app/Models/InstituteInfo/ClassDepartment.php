<?php

namespace App\Models\InstituteInfo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassDepartment extends Model
{
    use HasFactory;

    protected $table= 'class_departments';

    protected $guarded = ['id', 'created_at','updated_at'];

    protected $fillable = [
        'name',
        'head_photo',
        'teacher_id',
        'about',
        'status',
        'user_id',
    ];
}
