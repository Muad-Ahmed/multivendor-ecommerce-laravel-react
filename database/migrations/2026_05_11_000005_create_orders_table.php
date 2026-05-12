<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // TODO: استخدم Schema::create('orders') وأضف foreignId لـ user_id حتى تعرف المشتري صاحب الطلب.
        // TODO: أضف order_number فريد للعرض والدعم الفني.
        // TODO: أضف status مثل pending_payment/paid/fulfilled/cancelled.
        // TODO: أضف total_amount و currency؛ اجعل الإجمالي محسوبا في السيرفر فقط.
        // TODO: أضف shipping_address كـ json إذا أردت تخزين snapshot العنوان وقت الطلب.
        // TODO: أضف timestamps.
    }

    public function down(): void
    {
        // TODO: استخدم Schema::dropIfExists('orders') بعد حذف order_items و payments.
    }
};
