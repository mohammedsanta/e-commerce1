<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_type',
        'owner_id',
        'picture',
        'mobile',
        'country',
        'address',
    ];

    public function user()
    {
        return $this->morphTo();
    }

    public function owner()
    {
        return $this->morphOne(User::class,'owner');
    }

}
