<?php

namespace App\Http\Controllers\Storefront;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class ProductCatalogController extends Controller
{
    public function index(): Response
    {
        // TODO: ابدأ هنا بجلب المنتجات المنشورة فقط؛ استخدم Product::query() مع scope واضح مثل published() بعد أن تكتبه في الموديل.
        // TODO: أضف فلترة اختيارية حسب البائع أو التصنيف؛ الأفضل قراءة المدخلات عبر Request مخصص لاحقا لتسهيل الاختبار.
        // TODO: استخدم pagination بدلا من get() حتى لا تكبر الصفحة مع ازدياد المنتجات.
        // TODO: مرر بيانات خفيفة إلى Inertia مثل الاسم والسعر واسم البائع والصورة الأولى فقط، وتجنب إرسال كل أعمدة قاعدة البيانات.
        return Inertia::render('Storefront/Catalog');
    }
}
