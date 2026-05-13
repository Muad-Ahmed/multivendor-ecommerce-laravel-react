<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    // TODO: خزّن snapshot لاسم المنتج وسعره وقت الشراء حتى لا تتغير تفاصيل الطلب عند تعديل المنتج لاحقا.
    // TODO: أضف vendor_profile_id لتسهيل لوحة البائع دون joins معقدة.
    // TODO: أضف علاقة belongsTo مع Order و Product و VendorProfile.
    // TODO: استخدم status مستقل لعنصر الطلب إذا أردت أن يعالج كل بائع جزءه بشكل منفصل.

    protected $fillable = ['product_id', 'quantity',];

    protected $cast = [
        'product_snapshot' => 'array',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function vendorProfile(): BelongsTo
    {
        return $this->belongsTo(VendorProfile::class);
    }


}
