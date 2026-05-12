<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // TODO: استخدم Schema::create('order_items') وأضف foreignId لـ order_id و product_id و vendor_profile_id.
        // TODO: أضف product_name_snapshot حتى تحفظ اسم المنتج وقت الشراء.
        // TODO: أضف unit_amount و quantity و line_total_amount كأرقام صحيحة cents.
        // TODO: أضف fulfillment_status ليسمح لكل بائع بمعالجة منتجاته داخل الطلب.
        // TODO: أضف timestamps.
    }

    public function down(): void
    {
        // TODO: استخدم Schema::dropIfExists('order_items') قبل orders.
    }
};
