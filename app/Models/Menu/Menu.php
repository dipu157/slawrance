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
        'position',
        'status',
        'user_id',
    ];

    public function submenus()
    {
        return $this->hasMany(Sub_Menu::class, 'menu_id', 'id');
    }

    public function hasSubmenus()
    {
        return $this->submenus->isNotEmpty();
    }
}
