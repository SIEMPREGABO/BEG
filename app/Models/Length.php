<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Length extends Model
{
    use HasFactory;

    protected $table = 'lengths';

    public $timestamps = false; 

    public function productsWeights()
    {
        return $this->belongsToMany(Product::class, 'material_endurance');
        //return $this->belongsToMany(Product::class, 'material_endurance')->withPivot('price');
    }

    public function weightsProducts()
    {
        //return $this->belongsToMany(Endurance::class, 'material_endurance')->withPivot('price');
        return $this->belongsToMany(Weight::class, 'material_endurance');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'length_product');
    }
    
}
