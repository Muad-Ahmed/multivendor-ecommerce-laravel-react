<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // TODO: استخدم Schema::create('product_images') وأضف foreignId لـ product_id مع cascadeOnDelete.
        // TODO: أضف path أو disk/path إذا أردت دعم أكثر من storage disk.
        // TODO: أضف alt_text لتحسين الوصولية و SEO.
        // TODO: أضف is_primary و sort_order لتحديد صورة الغلاف وترتيب المعرض.
        // TODO: أضف timestamps.
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('storage_disk')->default('public');
            $table->string('image_path');
            $table->string('alt_text')->nullable();
            $table->boolean('is_primary')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            $table->index(['product_id', 'is_primary']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_images');
    }
};
