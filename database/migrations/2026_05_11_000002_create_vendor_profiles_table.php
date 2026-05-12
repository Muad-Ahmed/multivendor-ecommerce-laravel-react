<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // TODO: استخدم Schema::create('vendor_profiles') وابدأ بـ id ثم foreignId للمستخدم.
        // TODO: أضف store_name و slug؛ اجعل slug فريدا لأنه سيستخدم في روابط المتجر.
        // TODO: أضف status مثل pending/approved/suspended حتى يدير المشرف قبول البائعين.
        // TODO: أضف bio و support_email و branding_color كحقول اختيارية لتجربة لوحة بائع احترافية.
        // TODO: أضف timestamps في النهاية.
    }

    public function down(): void
    {
        // TODO: استخدم Schema::dropIfExists('vendor_profiles') عند الرجوع بالمهاجرات.
    }
};
