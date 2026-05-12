import { Head, Link } from '@inertiajs/react';
import CommerceShell from '@/Layouts/CommerceShell';

export default function Dashboard() {
    return (
        <CommerceShell
            eyebrow="Customer workspace"
            title="Your commerce cockpit"
            subtitle="هذه صفحة مشتري عامة بعد تسجيل الدخول. لاحقا ستربطها بالطلبات، العناوين، وسلة الشراء المحفوظة."
        >
            <Head title="Dashboard" />

            <section className="grid gap-5 lg:grid-cols-3">
                {['Recent orders', 'Saved carts', 'Payment status'].map((title) => (
                    <article key={title} className="fintech-panel rounded-xl p-6">
                        <h2 className="text-lg font-black text-slate-950 dark:text-white">{title}</h2>
                        <p className="mt-3 text-sm leading-6 text-slate-500 dark:text-slate-400">
                            TODO: اربط هذا القسم ببيانات المستخدم الحالي فقط بعد بناء العلاقات والـ policies.
                        </p>
                    </article>
                ))}
            </section>

            <Link href="/market" className="fintech-button mt-6">
                Continue shopping
            </Link>
        </CommerceShell>
    );
}
