<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table= 'sliders';

    protected $guarded = ['id', 'created_at','updated_at'];

    protected $fillable = [
        'title',
        'image',
        'description',
        'status',
        'user_id',
    ];
}
