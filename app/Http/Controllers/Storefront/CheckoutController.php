<?php

namespace App\Http\Controllers\Storefront;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class CheckoutController extends Controller
{
    public function show(): Response
    {
        // TODO: تحقق أن المستخدم يملك سلة نشطة قبل عرض الدفع؛ لا تثق بأي subtotal قادم من الواجهة.
        // TODO: احسب الإجمالي في السيرفر من الأسعار المخزنة في قاعدة البيانات، لأن الواجهة قابلة للتلاعب.
        // TODO: جهز لاحقا Stripe PaymentIntent في Action منفصل، ولا تضع منطق Stripe مباشرة داخل الكنترولر.
        // TODO: مرر client_secret إلى الواجهة فقط بعد التحقق من السلة والمستخدم والعملة.
        return Inertia::render('Storefront/Checkout');
    }
}
