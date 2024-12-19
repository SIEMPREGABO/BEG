<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $table = 'details';

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public $timestamps = false;
}
