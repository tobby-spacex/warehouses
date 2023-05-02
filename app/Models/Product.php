<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sku', 'price', 'description'];

    public function warehouses()
    {
        return $this->belongsToMany(Warehouse::class, 'warehouse_products')
            ->withPivot('quantity')
            ->withTimestamps();
    }
}
