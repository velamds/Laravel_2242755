<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model // tabla = products //user = users
{
    use HasFactory;
    //protected $table = "mi_tabla";

    function brand(){
        //products.brand_id == brand.id //Inner join
        return $this->belongsTo(Brand::class);
    }
}
