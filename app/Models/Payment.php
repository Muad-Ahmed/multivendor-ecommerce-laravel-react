<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    // TODO: خزّن stripe_payment_intent_id وحالة الدفع والمبلغ والعملة.
    // TODO: أضف علاقة belongsTo مع Order لأن الدفع يتبع طلبا واحدا في هذا المشروع التدريبي.
    // TODO: اجعل تحديث حالة الدفع يتم من Stripe webhook لاحقا، وليس من زر الواجهة فقط.
    // TODO: لا تخزن بيانات البطاقة أبدا؛ Stripe يتولى ذلك.
}
