<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = ['name','slug','desc','product_type','status','popular','image','poster','meta_title','meta_desc','meta_keywords'];


    public function products()
    {
        return $this->hasmany(Product::class,'category_id','id');
    }
}
