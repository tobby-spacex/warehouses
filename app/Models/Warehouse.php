<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'city', 'country', 'phone', 'email', 'description', 'status' ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'warehouse_products')
            ->withPivot('quantity')
            ->withTimestamps();
    }
}
