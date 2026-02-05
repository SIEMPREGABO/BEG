<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Card extends Model
{
    use HasFactory;

    protected $table = 'cards';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'owner',
        'num_tarjeta',
        'mes',
        'anio',
        //'fvc',
        'cvv',
        'last_digits',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'cvv',
        'num_tarjeta',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */


    protected function casts(): array
    {
        return [
            //'fvc' => 'mm/YY',
            //'cvv' => 'hashed',
        ];
    }
    /*
    public function getFvcAttribute($value)
    {
        return Carbon::parse($value)->format('m/y');
    }
*/
    public function users()
    {
        return $this->belongsToMany(User::class, 'card_user');
    }

    public $timestamps = false;
}
