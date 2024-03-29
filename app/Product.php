<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function Category(){
       return $this->belongsTo('App\Category');
    }
    public function productAttributes(){
       return $this->hasMany('App\ProductsAttribute');
    }
    public function products_images(){
      return $this->hasMany('App\Products_image');
   }
}
