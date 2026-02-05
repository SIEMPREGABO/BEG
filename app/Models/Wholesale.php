<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wholesale extends Model
{
    use HasFactory;

    protected $table = 'wholesales';

    public function products()
    {
        return $this->belongsToMany(Length::class, 'wholesale_product');
    }

    public $timestamps = false; 
}
