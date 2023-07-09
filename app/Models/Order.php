<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'country',
        'total',
        'quantity'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
