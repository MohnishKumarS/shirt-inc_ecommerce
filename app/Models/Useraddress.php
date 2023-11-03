<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Useraddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'address',
        'landmark',
        'state',
        'city',
        'pincode',
        'phone',
        'address_type',
        'delivery_instr',
        'status',
    ];

}
