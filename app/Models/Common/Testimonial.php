<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $table= 'testimonial';

    protected $guarded = ['id', 'created_at','updated_at'];

    protected $fillable = [
        'name',
        'photo',
        'position',
        'message',
        'status',
        'user_id',
    ];
}
