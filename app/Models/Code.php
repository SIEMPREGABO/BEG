<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;

    protected $table = 'codes';

    protected $fillable = [
        'code',
        'active',
        'caducidad'
    ];

    public static function getLastBegvCode()
    {
        // Filtra los códigos que empiezan con "BEGV", ordena por el número descendente y toma el primero
        return self::where('code', 'like', 'BEGV%')
            ->orderByRaw('CAST(SUBSTRING(code, 5) AS UNSIGNED) DESC') // Ordena numéricamente desde el 5to carácter
            ->first();
    }

    public $timestamps = false;
}
