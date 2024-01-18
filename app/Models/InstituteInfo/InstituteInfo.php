<?php

namespace App\Models\InstituteInfo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstituteInfo extends Model
{
    use HasFactory;

    protected $table= 'institute_infos';

    protected $guarded = ['id', 'created_at','updated_at'];

    protected $fillable = [
        'name',
        'phone',
        'logo',
        'email',
        'social_link1',
        'social_link2',
        'social_link3',
        'social_link4',
        'map_link',
        'address',
        'history',
        'city',
        'state',
        'post_code',        
        'website',
        'status',
        
    ];
}
