<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'available_sizes', 'price', 'brand_id', 'description', 'image'
    ];

    protected $casts = [
        'available_sizes' => 'array',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // function voor favorites
    public function users()
    {
        return $this->belongsToMany(User::class, 'favorites', 'product_id', 'user_id')->withTimestamps();
    }

    // function voor favorites
    public function userscart()
    {
        return $this->belongsToMany(User::class, 'shopping_carts', 'product_id', 'user_id')
            ->withPivot('quantity', 'size');
    }
}
