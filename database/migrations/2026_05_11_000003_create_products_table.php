<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // TODO: استخدم Schema::create('products') وأضف id ثم foreignId لـ vendor_profile_id مع index.
        // TODO: أضف name و slug و description؛ اجعل slug فريدا داخل كل بائع أو عالميا حسب قرارك.
        // TODO: خزّن price_amount كـ integer cents و price_currency كـ string قصير مثل USD.
        // TODO: أضف stock_quantity و status مثل draft/published/archived.
        // TODO: أضف timestamps ثم softDeletes إذا أردت أرشفة المنتجات بدلا من حذفها نهائيا.
    }

    public function down(): void
    {
        // TODO: استخدم Schema::dropIfExists('products') مع الانتباه لترتيب الجداول المرتبطة به.
    }
};
