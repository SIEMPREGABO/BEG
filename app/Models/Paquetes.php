<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paquetes extends Model
{
    use HasFactory;
    protected $table = 'paquetes';
    public $timestamps = true;

    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }

    public function detallesPaquete(){
        return $this->hasMany(PaqueteItem::class,'paquete_id');
    }

    
}
