<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    // use SoftDeletes;

        protected $fillable = [
            'user_id', 'category_id', 'category_type_id', 'brand_id', 'name', 'price', 'size', 'email', 'address', 'description', 'photo_main', 'photo_second', 'photo_last'
        ];
}
