<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends Model
{
    // TODO: عرّف fillable لمسار الصورة والترتيب و is_primary.
    // TODO: أضف casts لـ is_primary كـ boolean و sort_order كـ integer.
    // TODO: أضف علاقة belongsTo مع Product حتى لا توجد صورة بلا منتج.

    protected $fillable = ['is_primary', 'sort_order', 'alt_text', 'image_path'];

    protected $casts = [
        'is_primary' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }




}




