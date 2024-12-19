<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'slug',
        'mayoreo',
        'precio',
        'precio_mayoreo',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    //pivote entre materiales, resistencias y productos

    public function materialsEndurances()
    {
        //return $this->belongsToMany(Material::class, 'material_endurance')->withPivot('price');
        return $this->belongsToMany(Material::class, 'material_endurance');
    }

    //pivote entre resistencias, materiales y productos

    public function endurancesMaterials()
    {
        //return $this->belongsToMany(Endurance::class, 'material_endurance')->withPivot('price');
        return $this->belongsToMany(Endurance::class, 'material_endurance');
    }

    //pivote entre material y producto

    public function materials()
    {
        //return $this->belongsToMany(Material::class, 'material_endurance')->withPivot('price');
        return $this->belongsToMany(Material::class, 'material_product');
    }

    //pivote entre pesos, lomgitudes y productos

    public function weightsLengths()
    {
        //return $this->belongsToMany(Endurance::class, 'material_endurance')->withPivot('price');
        return $this->belongsToMany(Weight::class, 'weight_length');
    }

    //pivote entre pesos y productos


    public function weights()
    {
        //return $this->belongsToMany(Endurance::class, 'material_endurance')->withPivot('price');
        return $this->belongsToMany(Weight::class, 'weight_product');
    }

    //pivote entre longitudes, pesos y productos

    public function lengthsWeights()
    {
        //return $this->belongsToMany(Endurance::class, 'material_endurance')->withPivot('price');
        return $this->belongsToMany(Length::class, 'weight_length');
    }

    public function lengths()
    {
        //return $this->belongsToMany(Endurance::class, 'material_endurance')->withPivot('price');
        return $this->belongsToMany(Length::class, 'length_product');
    }

    public function sizes()
    {
        //return $this->belongsToMany(Endurance::class, 'material_endurance')->withPivot('price');
        return $this->belongsToMany(Size::class, 'size_product');
    }

    public function wholesales()
    {
        //return $this->belongsToMany(Endurance::class, 'material_endurance')->withPivot('price');
        return $this->belongsToMany(Wholesale::class, 'wholesale_product');
    }


    /*
    public function endurances()
    {
        //return $this->belongsToMany(Material::class, 'material_endurance')->withPivot('price');
        return $this->belongsToMany(Endurance::class, '');

    }*/

    public function scopeNombre($query, $nombre)
    {
        if ($nombre) {
            return $query->where('nombre', 'LIKE', "%$nombre%");
        }
        return $query;
    }
    
    public function scopePrecio($query, $limiteinferior, $limitesuperior)
    {
        if ($limiteinferior && $limitesuperior) {
            return $query->whereBetween('precio', [$limiteinferior, $limitesuperior]);
        }
        return $query;
    }
    
    public function scopeVariante($query, $variante)
    {
        if ($variante) { // Puede ser booleano, verifica explícitamente
            return $query->where('variante', '=', $variante);
        }
        return $query;
    }
    
    public function scopeCategory($query, $category_id)
    {
        if ($category_id) {
            return $query->where('category_id', '=', $category_id);
        }
        return $query;
    }
    


    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
