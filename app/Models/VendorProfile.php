<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VendorProfile extends Model
{
    // TODO: اكتب guarded أو fillable بعد تحديد الحقول النهائية؛ في التدريب ابدأ بـ fillable لأنه يعلّمك التحكم في mass assignment.
    // TODO: أضف علاقة belongsTo مع User؛ كل بائع يجب أن يرتبط بمستخدم واحد يملك role=vendor.
    // TODO: أضف scopes مثل approved() و pending() حتى لا تكرر شروط الحالة داخل الكنترولرات.
    // TODO: ضع أي accessor للعرض فقط هنا، لكن لا تضع حسابات مالية معقدة داخل الموديل.

    protected $fillable = [
        'store_name',
        'slug',
        'bio',
        'support_email',
        'branding_color',
    ];



    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', 'pending');
    }

    public function scopeApproved(Builder $query): Builder
    {
        return $query->where('status', 'approved');
    }
}
