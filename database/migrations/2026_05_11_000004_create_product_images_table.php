<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // TODO: استخدم Schema::create('product_images') وأضف foreignId لـ product_id مع cascadeOnDelete.
        // TODO: أضف path أو disk/path إذا أردت دعم أكثر من storage disk.
        // TODO: أضف alt_text لتحسين الوصولية و SEO.
        // TODO: أضف is_primary و sort_order لتحديد صورة الغلاف وترتيب المعرض.
        // TODO: أضف timestamps.
    }

    public function down(): void
    {
        // TODO: استخدم Schema::dropIfExists('product_images') قبل products عند الرجوع.
    }
};
