<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table= 'menus';

    protected $guarded = ['id', 'created_at','updated_at'];

    protected $fillable = [
        'name',
        'slug',
        'image',
        'status',
        'user_id',
    ];
}
