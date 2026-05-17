<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // TODO: استخدم Schema::create('products') وأضف id ثم foreignId لـ vendor_profile_id مع index.
        // TODO: أضف name و slug و description؛ اجعل slug فريدا داخل كل بائع أو عالميا حسب قرارك.
        // TODO: خزّن price_amount كـ integer cents و price_currency كـ string قصير مثل USD.
        // TODO: أضف stock_quantity و status مثل draft/published/archived.
        // TODO: أضف timestamps ثم softDeletes إذا أردت أرشفة المنتجات بدلا من حذفها نهائيا.
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_profile_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('slug');
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->unique(['vendor_profile_id', 'slug']);
            $table->integer('price_amount');
            $table->string('price_currency', 3)->default('USD');
            $table->integer('stock_quantity')->default(0);
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
