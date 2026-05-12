import { Head } from '@inertiajs/react';
import CommerceShell from '@/Layouts/CommerceShell';
import MetricCard from '@/Components/Commerce/MetricCard';

export default function Dashboard() {
    return (
        <CommerceShell
            eyebrow="Admin control room"
            title="Platform governance dashboard"
            subtitle="لوحة المشرف ترى المنصة كاملة: البائعون، المنتجات، الطلبات، وحالة الدفع. اجعلها منفصلة في المسارات والصلاحيات عن لوحة البائع."
        >
            <Head title="Admin Dashboard" />

            <section className="grid gap-5 md:grid-cols-4">
                <MetricCard label="Vendors" value="24" tone="cyan" helper="TODO: راقب حالة الموافقة." />
                <MetricCard label="Products" value="912" tone="violet" helper="TODO: أضف مراجعة المنتجات لاحقا." />
                <MetricCard label="Orders" value="1.8k" tone="lime" helper="TODO: اعرض مؤشرات عامة فقط." />
                <MetricCard label="Payments" value="Stripe" tone="rose" helper="TODO: اربط حالات الدفع من Payment model." />
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
