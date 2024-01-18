<?php

namespace App\Models\Notice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table= 'news';

    protected $guarded = ['id', 'created_at','updated_at'];

    protected $fillable = [
        'headline',
        'attachment',
        'short_description',
        'description',
        'status',
        'user_id',
    ];
}
