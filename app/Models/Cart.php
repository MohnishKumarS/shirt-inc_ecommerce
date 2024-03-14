<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

   protected $fillable = ['user_id','product_id','product_qty','product_color','product_design','product_size','mens_size','womens_size'];


   public function product(){
    return $this->belongsTo(Product::class,'product_id','id');
}



}
