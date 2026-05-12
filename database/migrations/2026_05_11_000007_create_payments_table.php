<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // TODO: استخدم Schema::create('payments') وأضف foreignId لـ order_id مع unique إذا كان لكل طلب دفعة واحدة فقط.
        // TODO: أضف provider بقيمة stripe حتى يبقى التصميم قابلا للتوسع لاحقا.
        // TODO: أضف provider_payment_intent_id كقيمة فريدة تربطك بـ Stripe.
        // TODO: أضف status و amount و currency و paid_at.
        // TODO: أضف raw_payload كـ json بشكل اختياري لتخزين بيانات webhook بعد تنقيتها.
        // TODO: أضف timestamps.
    }

    public function down(): void
    {
        // TODO: استخدم Schema::dropIfExists('payments') قبل orders.
    }
};
