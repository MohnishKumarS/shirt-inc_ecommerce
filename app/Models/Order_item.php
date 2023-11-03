<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use App\Models\Product;

class Order_item extends Model
{
    use HasFactory;

    protected $table = "order_item";

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'size',
        'mens_size',
        'womens_size'
       
    ];


    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

   
}
