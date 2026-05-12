<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // TODO: خزّن order_number كمعرّف قابل للعرض للمستخدم، واترك id الداخلي للاستخدام التقني.
    // TODO: أضف casts للمبالغ كـ integer cents وللعنوان كـ array إذا خزّنته JSON.
    // TODO: أضف علاقة belongsTo مع User للمشتري.
    // TODO: أضف علاقة hasMany مع OrderItem لأن الطلب الواحد قد يحتوي منتجات من عدة بائعين.
    // TODO: لا تضع منطق Stripe هنا؛ استخدم Payment model أو Action مخصص للدفع.
}
