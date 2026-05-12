<?php

namespace App\Policies;

use App\Models\User;
use App\Models\VendorProfile;

class VendorProfilePolicy
{
    public function view(User $user, VendorProfile $vendorProfile): bool
    {
        // TODO: اسمح للمشرف برؤية كل البائعين، واسمح للبائع برؤية ملفه فقط.
        return false;
    }

    public function approve(User $user, VendorProfile $vendorProfile): bool
    {
        // TODO: اسمح بهذا الإجراء للمشرف فقط، ولا تجعله متاحا للبائع نفسه.
        return false;
    }
}
