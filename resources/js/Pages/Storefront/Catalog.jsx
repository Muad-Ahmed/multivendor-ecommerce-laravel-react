import { Head, Link } from '@inertiajs/react';
import CommerceShell from '@/Layouts/CommerceShell';

const products = [
    { name: 'Pulse Wallet', vendor: 'North Ledger', price: '$89', accent: 'from-cyan-400 to-lime-300' },
    { name: 'Risk Monitor', vendor: 'Signal Stack', price: '$149', accent: 'from-violet-500 to-cyan-300' },
    { name: 'Checkout Kit', vendor: 'Flow Labs', price: '$59', accent: 'from-rose-400 to-orange-300' },
];

export default function Catalog() {
    return (
        <CommerceShell
            eyebrow="Shared storefront"
            title="A market that feels fast, liquid, and alive."
            subtitle="هنا ستعرض منتجات كل البائعين في واجهة واحدة. التصميم جاهز، والمنطق الذي يجلب المنتجات والفلاتر ستكتبه أنت داخل الكنترولر والموديل."
        >
            <Head title="Market" />

            <section className="grid gap-5 lg:grid-cols-[280px_1fr]">
                <aside className="fintech-panel rounded-xl p-5">
                    <h2 className="text-base font-black text-slate-950 dark:text-white">Filters</h2>
                    {['Vendor', 'Category', 'Price range', 'Availability'].map((filter) => (
                        <div key={filter} className="mt-4 rounded-lg border border-slate-200 bg-white/70 p-4 dark:border-white/10 dark:bg-white/5">
                            <p className="text-sm font-bold text-slate-700 dark:text-slate-200">{filter}</p>
                            <p className="mt-2 text-xs leading-5 text-slate-500 dark:text-slate-400">
                                TODO: اربط هذا الفلتر بـ query string ثم عالجه في ProductCatalogController.
                            </p>
                        </div>
                    ))}
                </aside>

                <div className="grid gap-5 md:grid-cols-3">
                    {products.map((product) => (
                        <article key={product.name} className="fintech-panel overflow-hidden rounded-xl">
                            <div className={`h-44 bg-gradient-to-br ${product.accent}`} />
                            <div className="p-5">
                                <p className="text-xs font-black uppercase tracking-[0.22em] text-cyan-700 dark:text-cyan-300">{product.vendor}</p>
                                <h2 className="mt-3 text-xl font-black text-slate-950 dark:text-white">{product.name}</h2>
                                <div className="mt-5 flex items-center justify-between">
                                    <span className="text-lg font-black text-slate-950 dark:text-white">{product.price}</span>
                                    <Link href="/checkout" className="fintech-button">
                                        Buy
                                    </Link>
                                </div>
                            </div>
                        </article>
                    ))}
                </div>
            </section>
        </CommerceShell>
    );
}
