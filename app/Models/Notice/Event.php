<?php

namespace App\Models\Notice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table= 'events';

    protected $guarded = ['id', 'created_at','updated_at'];

    protected $fillable = [
        'title',
        'image',
        'details',
        'event_date',
        'status',
        'user_id',
    ];
}
