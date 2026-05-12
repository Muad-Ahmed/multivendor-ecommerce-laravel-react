<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // TODO: عرّف fillable للحقول التي يستطيع البائع تعديلها فقط مثل name و description و price و stock.
    // TODO: أضف casts للسعر والمخزون والحالة؛ السعر يفضل تخزينه كـ integer cents لتجنب مشاكل الكسور.
    // TODO: أضف علاقة belongsTo مع VendorProfile حتى تعرف مالك المنتج.
    // TODO: أضف علاقة hasMany مع ProductImage حتى تستطيع عرض صورة رئيسية ومعرض صور.
    // TODO: أضف scope باسم published() لإخفاء المنتجات غير المنشورة عن واجهة المتجر.
}
