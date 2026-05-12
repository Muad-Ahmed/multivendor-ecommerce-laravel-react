<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class VendorDashboardController extends Controller
{
    public function index(): Response
    {
        // TODO: تحقق أن المستخدم الحالي يمتلك دور vendor قبل عرض اللوحة؛ الأفضل Middleware مخصص أو Policy واضحة.
        // TODO: اجلب إحصائيات تخص بائع المستخدم فقط، ولا تستخدم أي query عام قد يكشف بيانات بائع آخر.
        // TODO: اعرض المنتجات والطلبات الأحدث مع pagination أو limit صغير حتى تبقى اللوحة سريعة.
        // TODO: ضع أي حسابات مالية في Service أو Action لاحقا بدلا من الكنترولر.
        return Inertia::render('Vendor/Dashboard');
    }
}
