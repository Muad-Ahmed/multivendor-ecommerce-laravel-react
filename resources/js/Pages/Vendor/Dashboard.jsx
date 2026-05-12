import { Head } from '@inertiajs/react';
import CommerceShell from '@/Layouts/CommerceShell';
import MetricCard from '@/Components/Commerce/MetricCard';

export default function Dashboard() {
    return (
        <CommerceShell
            eyebrow="Vendor-only workspace"
            title="Vendor operations dashboard"
            subtitle="لوحة البائع منفصلة عن المشرف. كل رقم هنا يجب أن يكون محصورا في vendor_id الخاص بالمستخدم الحالي."
        >
            <Head title="Vendor Dashboard" />

            <section className="grid gap-5 md:grid-cols-4">
                <MetricCard label="Revenue" value="$8.4k" tone="lime" helper="TODO: احسبها من طلبات هذا البائع فقط." />
                <MetricCard label="Products" value="38" tone="cyan" helper="TODO: اربطها بجدول products." />
                <MetricCard label="Orders" value="126" tone="violet" helper="TODO: اعرض الطلبات الحديثة." />
                <MetricCard label="Rating" value="4.8" tone="rose" helper="TODO: أضف التقييمات لاحقا إن أردت." />
            </section>

            <section className="mt-5 grid gap-5 lg:grid-cols-[1fr_360px]">
                <div className="fintech-panel rounded-xl p-6">
                    <h2 className="text-xl font-black text-slate-950 dark:text-white">Product desk</h2>
                    <p className="mt-3 text-sm leading-7 text-slate-500 dark:text-slate-400">
                        TODO: هنا ستبني CRUD المنتجات للبائع مع Policy تمنع تعديل منتجات بائع آخر.
                    </p>
                </div>
                <aside className="fintech-panel rounded-xl p-6">
                    <h2 className="text-xl font-black text-slate-950 dark:text-white">Fulfillment queue</h2>
                    <p className="mt-3 text-sm leading-7 text-slate-500 dark:text-slate-400">
                        TODO: اربطها بعناصر الطلبات الخاصة بالبائع الحالي فقط.
                    </p>
                </aside>
            </section>
        </CommerceShell>
    );
}
