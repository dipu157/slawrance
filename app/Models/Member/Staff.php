<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table= 'staff';

    protected $guarded = ['id', 'created_at','updated_at'];

    protected $fillable = [
        'full_name',
        'position',
        'photo',
        'email',
        'mobile',
        'dob',
        'joining_date',
        'gender',
        'blood_group',
        'naional_id',
        'status',
        'user_id',
    ];
}
