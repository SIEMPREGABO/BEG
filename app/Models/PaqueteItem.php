<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaqueteItem extends Model
{
    use HasFactory;
    protected $table = 'paquetes_items';
    public $timestamps = false;

    public function paquete(): BelongsTo
    {
        return $this->belongsTo(Paquetes::class, 'paquete_id');
    }

    // Relación con el Producto: Cada item es una unidad de un producto
    public function producto(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'producto_id');
    }
}
