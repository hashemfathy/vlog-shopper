<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products_image extends Model
{
    public function product(){
        return $this->belongsTo('App\Product');
   }
}
