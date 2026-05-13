<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    // TODO: خزّن order_number كمعرّف قابل للعرض للمستخدم، واترك id الداخلي للاستخدام التقني.
    // TODO: أضف casts للمبالغ كـ integer cents وللعنوان كـ array إذا خزّنته JSON.
    // TODO: أضف علاقة belongsTo مع User للمشتري.
    // TODO: أضف علاقة hasMany مع OrderItem لأن الطلب الواحد قد يحتوي منتجات من عدة بائعين.
    // TODO: لا تضع منطق Stripe هنا؛ استخدم Payment model أو Action مخصص للدفع.

    protected $fillable = ['currency', 'shipping_address'];

    protected $casts = [
        'shipping_address' => 'array',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
    









}

 