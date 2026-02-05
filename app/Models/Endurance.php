<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endurance extends Model
{
    use HasFactory;

    protected $table = 'endurances';

    //pivote entre productos, materiales y resistencias 


    public function productsMaterials()
    {
        //return $this->belongsToMany(Product::class, 'material_endurance')->withPivot('price');
        return $this->belongsToMany(Product::class, 'material_endurance');

    
    }
    
    //pivote entre materiales, productos y resistencias 


    public function materialsProducts()
    {
        //return $this->belongsToMany(Material::class, 'material_endurance')->withPivot('price');
        return $this->belongsToMany(Material::class, 'material_endurance');

    }



    public $timestamps = false; 
}
