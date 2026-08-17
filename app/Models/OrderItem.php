<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'size',
        'quantity',
        'price',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    // Pedido ao qual o item pertence
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    // Produto comprado
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}