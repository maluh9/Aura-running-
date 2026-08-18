<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'image',
        'description',
        'price',
        'stock',
        'gender',
        'featured',
        'active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'featured' => 'boolean',
        'active' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class);
    }

    public function getImageUrlAttribute(): string
    {
        if (!$this->image) {
            return asset('favicon.ico');
        }

        // Imagens que estão dentro de public/imagens
        if (str_starts_with($this->image, 'imagens/')) {
            return asset($this->image);
        }

        // Imagens cadastradas pelo sistema em storage/app/public
        return asset('storage/' . $this->image);
    }
}
