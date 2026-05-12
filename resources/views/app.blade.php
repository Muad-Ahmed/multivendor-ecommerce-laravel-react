<!DOCTYPE html>
{{-- TODO: عند تخصيص اللغة لاحقا، اجعل app locale يأتي من إعداد المستخدم أو من config بدلا من قيمة ثابتة. --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- TODO: استخدم title inertia حتى تستطيع صفحات React تغيير عنوان الصفحة من خلال Head. --}}
        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        {{-- TODO: أبق Ziggy routes متاحا فقط إذا احتجت route() داخل React؛ هذا يسهل تغيير المسارات من Laravel. --}}
        @routes
        {{-- TODO: اترك Vite React Refresh في التطوير لأنه يعطيك تحديثا فوريا أثناء بناء الواجهة. --}}
        @viteReactRefresh
        {{-- TODO: app.jsx هو نقطة دخول Inertia، والصفحة الحالية تحمل تلقائيا حسب component القادم من Laravel. --}}
        @vite(['resources/js/app.jsx', "resources/js/Pages/{$page['component']}.jsx"])
        {{-- TODO: Inertia Head يجمع عناوين و meta الصفحات من React داخل head. --}}
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        {{-- TODO: هنا يحقن Inertia تطبيق React؛ لا تضع واجهات ثابتة في Blade إلا عند الحاجة القصوى. --}}
        @inertia
    </body>
</html>
