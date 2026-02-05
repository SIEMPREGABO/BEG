<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    public function productsEndurances()
    {
        return $this->belongsToMany(Product::class, 'material_endurance');
        //return $this->belongsToMany(Product::class, 'material_endurance')->withPivot('price');
    }

    public function endurancesProducts()
    {
        //return $this->belongsToMany(Endurance::class, 'material_endurance')->withPivot('price');
        return $this->belongsToMany(Endurance::class, 'material_endurance');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'material_product');
    }

    public $timestamps = false;
}
