<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected $fillable = [
        'website_name',
        'website_url',
        'page_title',
        'meta_keyword',
        'meta_description',
        'address1',
        'address2',
        'phone1',
        'phone2',
        'email1',
        'email2',
        'facebook',
        'instagram',
        'youtube',
        'twitter'
    ];
}
