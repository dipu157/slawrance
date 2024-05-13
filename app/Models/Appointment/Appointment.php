<?php

namespace App\Models\Appointment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table= 'appointments';

    protected $guarded = ['id', 'created_at','updated_at'];

    protected $fillable = [
        'gurdian_name',
        'mobile',
        'child_name',
        'class',
        'message',
    ];
}
