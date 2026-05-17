<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\VendorProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use Inertia\Response;

class VendorDashboardController extends Controller
{
    public function index(Request $request): Response
    {
        // TODO: تحقق أن المستخدم الحالي يمتلك دور vendor قبل عرض اللوحة؛ الأفضل Middleware مخصص أو Policy واضحة.
        // TODO: اجلب إحصائيات تخص بائع المستخدم فقط، ولا تستخدم أي query عام قد يكشف بيانات بائع آخر.
        // TODO: اعرض المنتجات والطلبات الأحدث مع pagination أو limit صغير حتى تبقى اللوحة سريعة.
        // TODO: ضع أي حسابات مالية في Service أو Action لاحقا بدلا من الكنترولر.

        $vendorProfile = $request->user()->vendorProfile;

        if (!$vendorProfile) {
            abort(403, "Sorry! you don't have a vendor account.");
        }

        Gate::authorize('view', $vendorProfile);

        $vendorData = VendorProfile::query()
            ->where('id', $vendorProfile->id)
            ->withCount(['products'])
            ->first();

        $products = Product::query()
            ->where('vendor_profile_id', $vendorProfile->id)
            ->select('id', 'vendor_profile_id', 'name', 'price_amount', 'price_currency', 'stock_quantity', 'created_at')
            ->with('productImages')
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return Inertia::render('Vendor/Dashboard', [
            'vendor' => $vendorData,
            'products' => $products,
        ]);
    }
}
