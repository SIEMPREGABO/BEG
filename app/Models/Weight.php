<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    use HasFactory;
    
    protected $table = 'weights';


    public function productsLengths()
    {
        return $this->belongsToMany(Product::class, 'weight_length');
        //return $this->belongsToMany(Product::class, 'material_endurance')->withPivot('price');
    }

    public function lengthsProducts()
    {
        //return $this->belongsToMany(Endurance::class, 'material_endurance')->withPivot('price');
        return $this->belongsToMany(Length::class, 'weight_length');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'weight_product');
    }


    public $timestamps = false; 

}
