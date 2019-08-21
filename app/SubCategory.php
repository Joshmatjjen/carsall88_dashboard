<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'category_type_id', 'name', 'photo', 'description'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
