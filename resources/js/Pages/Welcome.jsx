import { Link, Head } from '@inertiajs/react';
import CommerceShell from '@/Layouts/CommerceShell';
import MetricCard from '@/Components/Commerce/MetricCard';

export default function Welcome() {
    return (
        <CommerceShell
            eyebrow="Vibrant fintech marketplace"
            title="VendorX"
            subtitle="واجهة تدريبية لمتجر متعدد البائعين بقاعدة بيانات مشتركة، ولوحات منفصلة للمشتري والبائع والمشرف، مع Stripe كمسار دفع لاحق."
        >
            <Head title="VendorX Commerce" />

            <section className="grid gap-5 lg:grid-cols-[1.2fr_0.8fr]">
                <div className="fintech-panel rounded-xl p-6 sm:p-8">
                    <div className="grid gap-4 md:grid-cols-3">
                        <MetricCard label="Vendors" value="24" tone="cyan" helper="TODO: اربطها بعدد البائعين الموافق عليهم." />
                        <MetricCard label="Orders" value="1.8k" tone="lime" helper="TODO: احسبها من orders حسب الصلاحية." />
                        <MetricCard label="Payouts" value="$42k" tone="violet" helper="TODO: لاحقا اعرض مدفوعات Stripe فقط." />
                    </div>

                    <div className="mt-8 grid gap-4 md:grid-cols-2">
                        <Link href="/market" className="fintech-button">
                            Explore market
                        </Link>
                        <Link href="/vendor/dashboard" className="fintech-button-secondary">
                            Open vendor desk
                        </Link>
                    </div>
                </div>

                <aside className="fintech-panel rounded-xl p-6">
                    <p className="text-sm font-black uppercase tracking-[0.24em] text-cyan-700 dark:text-cyan-300">
                        Learning map
                    </p>
                    <div className="mt-5 space-y-4">
                        {['Models and migrations', 'Policies and roles', 'Vendor catalog', 'Stripe checkout'].map((item, index) => (
                            <div key={item} className="flex items-center gap-4 rounded-lg border border-slate-200 bg-white/70 p-4 dark:border-white/10 dark:bg-white/5">
                                <span className="grid h-9 w-9 place-items-center rounded-md bg-slate-950 text-sm font-black text-white dark:bg-cyan-300 dark:text-slate-950">
                                    {index + 1}
                                </span>
                                <span className="text-sm font-bold text-slate-700 dark:text-slate-200">{item}</span>
                            </div>
                        ))}
                    </div>
                </aside>
            </section>
        </CommerceShell>
    );
}
