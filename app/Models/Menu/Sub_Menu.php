<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_Menu extends Model
{
    use HasFactory;

    protected $table= 'sub_menus';

    protected $guarded = ['id', 'created_at','updated_at'];

    protected $fillable = [
        'menu_id',
        'name',
        'position',
        'status',
        'user_id',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class,'menu_id','id');
    }
}
