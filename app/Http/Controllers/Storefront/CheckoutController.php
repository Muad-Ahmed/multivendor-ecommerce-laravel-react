<?php

namespace App\Http\Controllers\Storefront;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CheckoutController extends Controller
{
    public function show(Request $request): Response
    {
        // TODO: تحقق أن المستخدم يملك سلة نشطة قبل عرض الدفع؛ لا تثق بأي subtotal قادم من الواجهة.
        // TODO: احسب الإجمالي في السيرفر من الأسعار المخزنة في قاعدة البيانات، لأن الواجهة قابلة للتلاعب.
        // TODO: جهز لاحقا Stripe PaymentIntent في Action منفصل، ولا تضع منطق Stripe مباشرة داخل الكنترولر.
        // TODO: مرر client_secret إلى الواجهة فقط بعد التحقق من السلة والمستخدم والعملة.

        $validated = $request->validate([
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $subtotal = 0;
        $calculatedItems = [];

        // TODO: تحسين الأداء (N+1 Query Problem):
        // يجب جلب جميع المنتجات دفعة واحدة خارج الدورة باستخدام Product::whereIn() بناءً على الـ IDs الممررة،

        foreach ($validated['items'] as $item) {
            $product = Product::find($item['product_id']);

            $itemTotal = $product->price_amount * $item['quantity'];
            $subtotal += $itemTotal;

            $calculatedItems[] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price_amount,
                'quantity' => $item['quantity'],
                'total' => $itemTotal,
            ];
        }

        return Inertia::render('Storefront/Checkout', [
            'cartItems' => $calculatedItems,
            'subtotal' => $subtotal,
            'tax' => $subtotal * 0.15,
            'total' => $subtotal + ($subtotal * 0.15),
        ]);
    }
}
