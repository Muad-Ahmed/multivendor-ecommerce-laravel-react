<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // TODO: استخدم Schema::create('payments') وأضف foreignId لـ order_id مع unique إذا كان لكل طلب دفعة واحدة فقط.
        // TODO: أضف provider بقيمة stripe حتى يبقى التصميم قابلا للتوسع لاحقا.
        // TODO: أضف provider_payment_intent_id كقيمة فريدة تربطك بـ Stripe.
        // TODO: أضف status و amount و currency و paid_at.
        // TODO: أضف raw_payload كـ json بشكل اختياري لتخزين بيانات webhook بعد تنقيتها.
        // TODO: أضف timestamps.
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->string('provider')->default('stripe');
            $table->string('provider_payment_intent_id')->unique();
            $table->enum('status', [
                'pending',
                'paid',
                'failed',
                'refunded',
            ])->default('pending');
            $table->integer('amount');
            $table->string('currency', 3)->default('USD');
            $table->timestamp('paid_at')->nullable();
            $table->json('raw_payload')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
