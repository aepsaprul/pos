<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }

    public function inventoryProductIn() {
        return $this->hasMany(InventoryProductIn::class, 'product_id', 'id');
    }
}
