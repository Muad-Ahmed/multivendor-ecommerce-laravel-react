<?php

namespace App\Policies;

use App\Models\User;
use App\Models\VendorProfile;
use Illuminate\Support\Facades\Auth;

class VendorProfilePolicy
{
    public function view(User $user, VendorProfile $vendorProfile): bool
    {
        // TODO: اسمح للمشرف برؤية كل البائعين، واسمح للبائع برؤية ملفه فقط.
        return $user->role === 'admin' || $user->id === $vendorProfile->user_id;
    }

    public function approve(User $user, VendorProfile $vendorProfile): bool
    {
        // TODO: اسمح بهذا الإجراء للمشرف فقط، ولا تجعله متاحا للبائع نفسه.
        return $user->role === 'admin';
    }
}
