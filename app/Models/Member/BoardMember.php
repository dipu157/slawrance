<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardMember extends Model
{
    use HasFactory;

    protected $table= 'board_members';

    protected $guarded = ['id', 'created_at','updated_at'];

    protected $fillable = [
        'name',
        'position',
        'photo',
        'email',
        'mobile',
        'dob',
        'gender',
        'blood_group',
        'status',
        'user_id',
    ];
}
