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
        'payment_id',
        'payment_method',
        'payment_type',
        'payment_status_detail',
        'pix_copy_paste',
        'pix_qr_code_base64',
        'payment_ticket_url',
        'payment_expires_at',
        'paid_at',
    ];

    protected $casts = [
        'total' => 'decimal:2',
        'paid_at' => 'datetime',
        'payment_expires_at' => 'datetime',
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