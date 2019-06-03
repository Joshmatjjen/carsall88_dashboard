<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    // use SoftDeletes;

        protected $fillable = [
            'user_id', 'category_id',  'sub_category_id', 'brand_id', 'name', 'price', 'model', 'colour', 'year', 'size', 'email', 'address', 'description', 'photo1', 'photo2', 'photo3', 'photo4'
        ];

        public function user(){
            return $this->belongsTo('App\User');
        }

        public function category(){
            return $this->belongsTo('App\Category');
        }

        public function subcategory(){
            return $this->belongsTo('App\SubCategory');
        }

        public function brand(){
            return $this->belongsTo('App\Brand');
        }
}
