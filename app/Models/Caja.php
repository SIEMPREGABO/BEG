<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Caja extends Model
{
    use HasFactory;
    protected $table = 'cajas';
    public $timestamps = false;
    //protected $primaryKey = '';


    public function paquetes(): HasMany
    {
        return $this->hasMany(Paquetes::class, 'caja_id');
    }

}
