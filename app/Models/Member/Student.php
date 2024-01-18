<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table= 'students';

    protected $guarded = ['id', 'created_at','updated_at'];

    protected $fillable = [
        'full_name',
        'father_name',
        'mother_name',
        'roll',
        'class_department',
        'class_department_start',
        'photo',
        'email',
        'mobile',
        'dob',
        'gender',
        'blood_group',
        'address',
        'naional_id',
        'status',
        'user_id',
    ];
}
