# خطة العمل القادمة لمشروع VendorX

هذا المشروع الآن يحتوي على هيكل تدريبي لمتجر Laravel + React + Inertia متعدد البائعين. الواجهات موجودة كتصميم حديث بنمط Fintech، والمنطق الحقيقي متروك لك داخل تعليقات `TODO` حتى تتدرب على كتابته بنفسك.

## من أين تبدأ؟

1. ابدأ من قاعدة البيانات:
   - `database/migrations/2026_05_11_000001_add_marketplace_fields_to_users_table.php`
   - `database/migrations/2026_05_11_000002_create_vendor_profiles_table.php`
   - `database/migrations/2026_05_11_000003_create_products_table.php`
   - `database/migrations/2026_05_11_000004_create_product_images_table.php`
   - `database/migrations/2026_05_11_000005_create_orders_table.php`
   - `database/migrations/2026_05_11_000006_create_order_items_table.php`
   - `database/migrations/2026_05_11_000007_create_payments_table.php`

2. بعد كتابة الأعمدة شغل:
   ```powershell
   php artisan migrate:fresh
   ```

3. انتقل إلى الموديلات:
   - `app/Models/VendorProfile.php`
   - `app/Models/Product.php`
   - `app/Models/ProductImage.php`
   - `app/Models/Order.php`
   - `app/Models/OrderItem.php`
   - `app/Models/Payment.php`

4. اكتب العلاقات والـ casts والـ scopes، ثم ابدأ بالسياسات:
   - `app/Policies/ProductPolicy.php`
   - `app/Policies/VendorProfilePolicy.php`

5. بعدها اكتب الكنترولرات تدريجيا:
   - `app/Http/Controllers/Storefront/ProductCatalogController.php`
   - `app/Http/Controllers/Storefront/CheckoutController.php`
   - `app/Http/Controllers/Vendor/VendorDashboardController.php`
   - `app/Http/Controllers/Admin/AdminDashboardController.php`

6. أخيرا اربط React بالبيانات الحقيقية:
   - `resources/js/Pages/Storefront/Catalog.jsx`
   - `resources/js/Pages/Storefront/Checkout.jsx`
   - `resources/js/Pages/Vendor/Dashboard.jsx`
   - `resources/js/Pages/Admin/Dashboard.jsx`
   - `resources/js/Stores/useCommerceStore.js`

## أوامر PowerShell التي نفذتها

```powershell
Get-ChildItem -Force
rg --files
git status --short
Get-Content package.json
Get-Content composer.json
Get-Content routes\web.php
Get-Content resources\js\app.jsx
Get-Content tailwind.config.js
Get-Content resources\css\app.css
New-Item -ItemType Directory -Force app\Http\Controllers\Storefront,app\Http\Controllers\Vendor,app\Http\Controllers\Admin,app\Models,app\Policies,database\migrations,database\factories,resources\js\Layouts,resources\js\Pages\Storefront,resources\js\Pages\Vendor,resources\js\Pages\Admin,resources\js\stores,resources\js\Components\Commerce,tests\Unit\Domain | Out-Null
```

## أوامر تحتاجها أثناء التطوير

```powershell
composer install
npm install
php artisan key:generate
php artisan migrate
npm run dev
composer test
npm run build
```

## ملاحظات مهمة

- لا تشغل migrations الجديدة كما هي وتتوقع إنشاء الجداول؛ هي ملفات تعليمية آمنة الآن وتحتوي على تعليمات `TODO` فقط.
- اجعل Laravel هو مصدر الحقيقة للأسعار والمخزون والدفع، ولا تثق بقيم تأتي من React.
- استخدم Stripe PaymentIntent في السيرفر، ثم مرر `client_secret` إلى الواجهة عند الحاجة فقط.
- لا تضف كوبونات أو عمولات الآن؛ ركز على Marketplace core: بائعون، منتجات، طلبات، دفع.
- افصل لوحة البائع عن لوحة المشرف بالمسارات، الـ middleware، والـ policies.
- استخدم Zustand لحالة الواجهة المؤقتة فقط مثل الثيم، فلاتر الكتالوج، أو سلة draft قبل اعتماد السيرفر.
- اختبر قواعد العزل بين البائعين أولا؛ هذه أهم نقطة أمان في مشروع متعدد البائعين.

## قائمة الملفات التي ستعمل عليها

- `routes/web.php`
- `resources/views/app.blade.php`
- `resources/css/app.css`
- `resources/js/app.jsx`
- `resources/js/Layouts/CommerceShell.jsx`
- `resources/js/Components/Commerce/MetricCard.jsx`
- `resources/js/Stores/useCommerceStore.js`
- `resources/js/Pages/Welcome.jsx`
- `resources/js/Pages/Dashboard.jsx`
- `resources/js/Pages/Storefront/Catalog.jsx`
- `resources/js/Pages/Storefront/Checkout.jsx`
- `resources/js/Pages/Vendor/Dashboard.jsx`
- `resources/js/Pages/Admin/Dashboard.jsx`
- `app/Http/Controllers/Storefront/ProductCatalogController.php`
- `app/Http/Controllers/Storefront/CheckoutController.php`
- `app/Http/Controllers/Vendor/VendorDashboardController.php`
- `app/Http/Controllers/Admin/AdminDashboardController.php`
- `app/Models/VendorProfile.php`
- `app/Models/Product.php`
- `app/Models/ProductImage.php`
- `app/Models/Order.php`
- `app/Models/OrderItem.php`
- `app/Models/Payment.php`
- `app/Policies/ProductPolicy.php`
- `app/Policies/VendorProfilePolicy.php`
- `database/factories/VendorProfileFactory.php`
- `database/factories/ProductFactory.php`
- `tests/Unit/Domain/MultiVendorBoundariesTest.php`
- كل ملفات migrations الجديدة بتاريخ `2026_05_11`
