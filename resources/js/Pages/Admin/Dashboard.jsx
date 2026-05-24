import { Head } from '@inertiajs/react';
import CommerceShell from '@/Layouts/CommerceShell';
import MetricCard from '@/Components/Commerce/MetricCard';

export default function Dashboard({ vendors, products, orders, payments }) {

    const formatNumber = (num) => {
        return num >= 1000 ? (num / 1000).toFixed(1) + 'k' : num;
    };

    return (
        <CommerceShell
            eyebrow="Admin control room"
            title="Platform governance dashboard"
            subtitle="لوحة المشرف ترى المنصة كاملة: البائعون، المنتجات، الطلبات، وحالة الدفع. اجعلها منفصلة في المسارات والصلاحيات عن لوحة البائع."
        >
            <Head title="Admin Dashboard" />

            <section className="grid gap-5 md:grid-cols-4">
                <MetricCard label="Vendors" value={formatNumber(vendors)} tone="cyan" helper="TODO: راقب حالة الموافقة." />
                <MetricCard label="Products" value={formatNumber(products)} tone="violet" helper="TODO: أضف مراجعة المنتجات لاحقا." />
                <MetricCard label="Orders" value={formatNumber(orders)} tone="lime" helper="TODO: اعرض مؤشرات عامة فقط." />
                <MetricCard label="Payments" value={formatNumber(payments)} tone="rose" helper="TODO: اربط حالات الدفع من Payment model." />
            </section>

            <section className="mt-5 grid gap-5 lg:grid-cols-2">
                {['Vendor approvals', 'Risk and disputes'].map((title) => (
                    <article key={title} className="fintech-panel rounded-xl p-6">
                        <h2 className="text-xl font-black text-slate-950 dark:text-white">{title}</h2>
                        <p className="mt-3 text-sm leading-7 text-slate-500 dark:text-slate-400">
                            TODO: اكتب هنا لاحقا query مخصصا داخل Controller أو Action، ثم اختبره بـ Pest.
                        </p>
                    </article>
                ))}
            </section>
        </CommerceShell>
    );
}
