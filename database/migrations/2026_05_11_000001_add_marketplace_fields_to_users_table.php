<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // TODO: استخدم Schema::table('users') لإضافة role بقيم مثل customer و vendor و admin.
        // TODO: أضف index على role لأنك ستفلتر المستخدمين حسب الدور كثيرا في لوحة المشرف.
        // TODO: أضف حقل phone اختياري إذا احتجت بيانات تواصل للشحن أو دعم البائع.
    }

    public function down(): void
    {
        // TODO: استخدم Schema::table('users') لحذف الحقول التي أضفتها في up بنفس الترتيب الآمن.
    }
};
