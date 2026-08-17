<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'order_number',
        'total',
        'status',
        'payment_status',
        'tracking_code',
    ];

    protected $casts = [
        'total' => 'decimal:2',
    ];

    // Usuário dono do pedido
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Produtos/itens desse pedido
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}