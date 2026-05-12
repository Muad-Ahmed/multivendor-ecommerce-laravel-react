<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // TODO: استخدم Schema::create('orders') وأضف foreignId لـ user_id حتى تعرف المشتري صاحب الطلب.
        // TODO: أضف order_number فريد للعرض والدعم الفني.
        // TODO: أضف status مثل pending_payment/paid/fulfilled/cancelled.
        // TODO: أضف total_amount و currency؛ اجعل الإجمالي محسوبا في السيرفر فقط.
        // TODO: أضف shipping_address كـ json إذا أردت تخزين snapshot العنوان وقت الطلب.
        // TODO: أضف timestamps.
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('order_number')->unique();
            $table->enum('status', ['pending_payment', 'paid', 'fulfilled', 'cancelled'])->default('pending_payment');
            $table->integer('total_amount');
            $table->string('currency', 3)->default('USD');
            $table->json('shipping_address');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
    }
};
