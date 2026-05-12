<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorProfile extends Model
{
    // TODO: اكتب guarded أو fillable بعد تحديد الحقول النهائية؛ في التدريب ابدأ بـ fillable لأنه يعلّمك التحكم في mass assignment.
    // TODO: أضف علاقة belongsTo مع User؛ كل بائع يجب أن يرتبط بمستخدم واحد يملك role=vendor.
    // TODO: أضف scopes مثل approved() و pending() حتى لا تكرر شروط الحالة داخل الكنترولرات.
    // TODO: ضع أي accessor للعرض فقط هنا، لكن لا تضع حسابات مالية معقدة داخل الموديل.
}
