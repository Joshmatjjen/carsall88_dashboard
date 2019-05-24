<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    // use SoftDeletes;

        protected $fillable = [
            'name', 'price', 'size', 'category', 'category_type', 'email', 'address', 'description', 'photo_main', 'photo_second', 'photo_last'
        ];
}
