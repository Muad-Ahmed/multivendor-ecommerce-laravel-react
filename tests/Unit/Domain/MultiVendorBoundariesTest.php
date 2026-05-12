<?php

use App\Models\Product;
use App\Models\User;

it('prevents vendors from updating products they do not own', function () {
    // TODO: أنشئ مستخدمين بائعين لكل واحد vendor profile مستقل.
    // TODO: أنشئ منتجا تابعا للبائع الأول.
    // TODO: استدع ProductPolicy::update للمستخدم الثاني مع منتج البائع الأول.
    // TODO: توقع أن تكون النتيجة false لأن هذه قاعدة الأمان الأساسية في marketplace.
    expect(true)->toBeTrue();
});

it('keeps stripe totals server-owned', function () {
    // TODO: أنشئ order items بأسعار من قاعدة البيانات وليس من request الواجهة.
    // TODO: نفّذ Action يحسب الإجمالي ثم أنشئ PaymentIntent بالقيمة المحسوبة.
    // TODO: توقع أن أي subtotal قادم من الواجهة يتم تجاهله.
    expect(true)->toBeTrue();
});
