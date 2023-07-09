<?php

namespace App\Models;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'picture',
        'description',
        'price',
        'type',
        'color',
        'quantity',
        'user_id',
        'supplier_id',
        'supplierable_id',
        'supplierable_type',
    ];

    public function userCreated()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function products()
    {
        return $this->belongsToMany(Supplier::class,'productables');
    }

}
