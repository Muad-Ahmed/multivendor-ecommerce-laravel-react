<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\VendorProfile;
use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;
use Inertia\Response;

class AdminDashboardController extends Controller
{
    public function index(): Response
    {
        // TODO: تحقق أن المستخدم admin عبر Middleware منفصل قبل السماح بالدخول لهذه الصفحة.
        // TODO: اجلب مؤشرات عامة مثل عدد البائعين والطلبات والمنتجات؛ لا تضع عمليات aggregation الثقيلة مباشرة هنا.
        // TODO: افصل قرارات الموافقة على البائعين والمنتجات في Policies حتى تكون قابلة للاختبار.
        // TODO: مرر للواجهة بيانات مختصرة فقط، واجعل التفاصيل في صفحات فرعية لاحقا.

        $vendorsCount = VendorProfile::count();
        $ordersCount = Order::count();

        $productsCount = Cache::remember('admin_dashboard_statu', 600, function () {
            return Product::count();
        });

        return Inertia::render('Admin/Dashboard', [
            'vendors' => $vendorsCount,
            'products' => $productsCount,
            'orders' => $ordersCount,
        ]);
    }
}
