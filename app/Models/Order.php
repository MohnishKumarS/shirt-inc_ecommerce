<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order_item;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'addr_id',
        'total_price',
        'status',
        'message',
        'tracking_no'
    ];

    public function orderitem(){
        return $this->hasMany(Order_item::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Useraddress::class,'address_id','id');
    }
}
