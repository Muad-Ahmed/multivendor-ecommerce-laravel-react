<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    // TODO: عرّف fillable للحقول التي يستطيع البائع تعديلها فقط مثل name و description و price و stock.
    // TODO: أضف casts للسعر والمخزون والحالة؛ السعر يفضل تخزينه كـ integer cents لتجنب مشاكل الكسور.
    // TODO: أضف علاقة belongsTo مع VendorProfile حتى تعرف مالك المنتج.
    // TODO: أضف علاقة hasMany مع ProductImage حتى تستطيع عرض صورة رئيسية ومعرض صور.
    // TODO: أضف scope باسم published() لإخفاء المنتجات غير المنشورة عن واجهة المتجر.

    protected $fillable = [
        'name',
        'description',
        'price_amount',
        'price_currency',
        'stock_quantity',
        'status',
    ];

    protected $casts = [
        'price_amount' => 'integer',
        'stock_quantity' => 'integer',
    ];

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(VendorProfile::class, 'vendor_profile_id');
    }

    public function productImages(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published');
    }
    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', 'pending');
    }


}
