<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // TODO: استخدم Schema::create('vendor_profiles') وابدأ بـ id ثم foreignId للمستخدم.
        // TODO: أضف store_name و slug؛ اجعل slug فريدا لأنه سيستخدم في روابط المتجر.
        // TODO: أضف status مثل pending/approved/suspended حتى يدير المشرف قبول البائعين.
        // TODO: أضف bio و support_email و branding_color كحقول اختيارية لتجربة لوحة بائع احترافية.
        // TODO: أضف timestamps في النهاية.
        Schema::create('vendor_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('store_name');
            $table->string('slug')->unique();
            $table->enum('status', ['pending', 'approved', 'suspended'])->default('pending')->index();
            $table->text('bio')->nullable();
            $table->string('support_email')->nullable();
            $table->string('branding_color', 7)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vendor_profiles');
    }
};
