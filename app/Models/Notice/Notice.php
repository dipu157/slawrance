<?php

namespace App\Models\Notice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    protected $table= 'notices';

    protected $guarded = ['id', 'created_at','updated_at'];

    protected $fillable = [
        'title',
        'attachment',
        'short_description',
        'description',
        'notice_date',
        'status',
        'user_id',
    ];
}
