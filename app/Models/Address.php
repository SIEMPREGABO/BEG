<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    protected $fillable = [
        'estado',
        'municipio',
        'colonia',
        'calle',
        'cp',
        'num_ext',
        'num_int',
    ];

    /*protected $hidden = [

    ];

    protected function casts(): array
    {
        return [
            
        ];
    }*/

    public function users()
    {
        return $this->belongsToMany(User::class, 'address_user');
        
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public $timestamps = false; 
}
