import CartDrawer from '@/Components/CartDrawer';
import { useCommerceStore } from '@/Stores/useCommerceStore';
import { Link } from '@inertiajs/react';
import { useEffect } from 'react';


const navigation = [
    { label: 'Market', href: '/market' },
    { label: 'Vendor', href: '/vendor/dashboard' },
    { label: 'Admin', href: '/admin/dashboard' },
    { label: 'Checkout', href: '/checkout' },
];

export default function CommerceShell({ children, eyebrow = 'Multi-vendor commerce', title, subtitle }) {

    const { cart, toggleCart, theme, toggleTheme } = useCommerceStore();

    useEffect(() => {
        document.documentElement.classList.toggle('dark', theme === 'dark');
    }, [theme]);

    // sum of products quantities
    const totalItems = cart.reduce((total, item) => total + (item.quantity || 0), 0);

    return (
        <div className="min-h-screen overflow-hidden bg-[radial-gradient(circle_at_top_left,rgba(6,182,212,0.18),transparent_32%),linear-gradient(135deg,#f8fafc_0%,#eef2ff_45%,#ecfeff_100%)] dark:bg-[radial-gradient(circle_at_top_left,rgba(6,182,212,0.22),transparent_34%),linear-gradient(135deg,#020617_0%,#111827_48%,#082f49_100%)]">

            {/* CartDrawer Component */}
            <CartDrawer />

            <header className="mx-auto flex w-full max-w-7xl items-center justify-between px-5 py-5 sm:px-8">
                <Link href="/" className="flex items-center gap-3">
                    <span className="grid h-10 w-10 place-items-center rounded-lg bg-slate-950 text-sm font-black text-cyan-300 shadow-glow dark:bg-white dark:text-slate-950">
                        VX
                    </span>
                    <span className="text-sm font-black uppercase tracking-[0.24em] text-slate-900 dark:text-white">
                        VendorX
                    </span>
                </Link>

                <nav className="hidden items-center gap-2 md:flex">
                    {navigation.map((item) => (
                        <Link
                            key={item.href}
                            href={item.href}
                            className="rounded-md px-3 py-2 text-sm font-semibold text-slate-600 transition hover:bg-white/70 hover:text-slate-950 dark:text-slate-300 dark:hover:bg-white/10 dark:hover:text-white"
                        >
                            {item.label}
                        </Link>
                    ))}
                </nav>

                <div className="flex items-center gap-3">
                    {/* Cart Trigger button*/}
                    <button
                        type="button"
                        className="relative flex items-center justify-center rounded-lg border border-slate-200 bg-white/70 p-2.5 text-slate-600 transition hover:bg-white hover:text-slate-950 dark:border-white/10 dark:bg-white/5 dark:text-slate-300 dark:hover:bg-white/10 dark:hover:text-white"
                        onClick={toggleCart}
                    >
                        <span className="text-lg">🛒</span>
                        {totalItems > 0 && (
                            <span className="absolute -top-1.5 -right-1.5 flex h-5 w-5 items-center justify-center rounded-full bg-cyan-500 text-[10px] font-black text-white shadow-glow">
                                {totalItems}
                            </span>
                        )}
                    </button>

                    <button
                        type="button"
                        className="fintech-button-secondary"
                        onClick={toggleTheme}
                    >
                        Theme
                    </button>
                </div>
            </header>

            <main className="mx-auto w-full max-w-7xl px-5 pb-12 sm:px-8">
                {(title || subtitle) && (
                    <section className="grid gap-8 py-8 lg:grid-cols-[1.05fr_0.95fr] lg:items-end">
                        <div>
                            <p className="text-xs font-black uppercase tracking-[0.28em] text-cyan-700 dark:text-cyan-300">
                                {eyebrow}
                            </p>
                            <h1 className="mt-4 max-w-3xl text-4xl font-black leading-tight text-slate-950 dark:text-white sm:text-6xl">
                                {title}
                            </h1>
                        </div>
                        <p className="max-w-2xl text-base leading-8 text-slate-600 dark:text-slate-300">
                            {subtitle}
                        </p>
                    </section>
                )}

                {children}
            </main>
        </div>
    );
}
