<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscriptor extends Model
{
    use HasFactory;

    protected $table = 'notification_email';


    protected $fillable = [
        'email'
    ];

    public $timestamps = false; 
}
