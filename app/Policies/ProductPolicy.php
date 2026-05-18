<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;

class ProductPolicy
{
    public function update(User $user, Product $product): bool
    {
        // TODO: تحقق أن المستخدم بائع وأن product->vendor_profile_id يطابق vendor profile الخاص به.
        // TODO: أعد true فقط عندما يكون المالك هو نفسه؛ هذه أهم حماية في تطبيق متعدد البائعين.
        return $user->vendorProfile &&  $product->vendor_profile_id === $user->vendorProfile->id;
    }

    public function delete(User $user, Product $product): bool
    {
        // TODO: استخدم نفس قاعدة الملكية، ويمكنك لاحقا منع الحذف إذا كان المنتج داخل طلب مكتمل.
        return $user->vendorProfile &&  $product->vendor_profile_id === $user->vendorProfile->id;
    }
}
