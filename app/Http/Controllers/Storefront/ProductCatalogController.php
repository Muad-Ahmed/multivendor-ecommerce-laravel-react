<?php

namespace App\Http\Controllers\Storefront;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProductCatalogController extends Controller
{
    public function index(Request $request): Response
    {
        // TODO: ابدأ هنا بجلب المنتجات المنشورة فقط؛ استخدم Product::query() مع scope واضح مثل published() بعد أن تكتبه في الموديل.
        // TODO: أضف فلترة اختيارية حسب البائع أو التصنيف؛ الأفضل قراءة المدخلات عبر Request مخصص لاحقا لتسهيل الاختبار.
        // TODO: استخدم pagination بدلا من get() حتى لا تكبر الصفحة مع ازدياد المنتجات.
        // TODO: مرر بيانات خفيفة إلى Inertia مثل الاسم والسعر واسم البائع والصورة الأولى فقط، وتجنب إرسال كل أعمدة قاعدة البيانات.

        $products = Product::query()
            ->published()
            ->vendor($request->integer('vendor_id'))
            ->category($request->integer('category_id'))
            ->with('vendor:id,name')
            ->select('id', 'name', 'price', 'vendor_id', 'category_id')
            ->latest()
            ->paginate(12)
            ->through(fn($product) => [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'vendor' => [
                    'id' => $product->vendor->id,
                    'name' => $product->vendor->name,
                ]
            ])
            ->withQueryString();

        return Inertia::render('Storefront/Catalog', compact('products'));
    }
}
