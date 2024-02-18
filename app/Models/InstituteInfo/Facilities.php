<?php

namespace App\Models\InstituteInfo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facilities extends Model
{
    use HasFactory;

    protected $table= 'facilities';

    protected $guarded = ['id', 'created_at','updated_at'];

    protected $fillable = [
        'title',
        'icon',
        'description',
        'status',
        'user_id',
    ];
}
