<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuDetails extends Model
{
    use HasFactory;

    protected $table= 'menu_details';

    protected $guarded = ['id', 'created_at','updated_at'];

    protected $fillable = [
        'menu_id',
        'title',
        'image',
        'description',
        'status',
        'user_id',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class,'menu_id','id');
    }
}
