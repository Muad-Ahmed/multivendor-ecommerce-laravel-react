import { Head } from '@inertiajs/react';
import CommerceShell from '@/Layouts/CommerceShell';

export default function Checkout({ cartItems, subtotal, tax, total }) {
    return (
        <CommerceShell
            eyebrow="Stripe-ready checkout"
            title="Checkout without trusting the browser."
            subtitle="الواجهة هنا مكان Stripe Elements لاحقا. الحسابات الحقيقية يجب أن تأتي من Laravel ثم Stripe PaymentIntent."
        >
            <Head title="Checkout" />

            <section className="grid gap-5 lg:grid-cols-[1fr_380px]">
                <div className="fintech-panel rounded-xl p-6">
                    <h2 className="text-xl font-black text-slate-950 dark:text-white">Payment method</h2>
                    <div className="mt-5 rounded-lg border border-dashed border-cyan-300 bg-cyan-50/70 p-6 dark:border-cyan-300/30 dark:bg-cyan-300/10">
                        <p className="text-sm leading-7 text-slate-600 dark:text-slate-300">
                            TODO: ثبت Stripe JS ثم ضع Stripe Elements هنا. لا تحفظ بيانات البطاقة في قاعدة بياناتك.
                        </p>
                    </div>
                </div>

                <aside className="fintech-panel rounded-xl p-6">
                    <h2 className="text-xl font-black text-slate-950 dark:text-white">Order summary</h2>
                    <div className="mt-5 space-y-3 text-sm text-slate-600 dark:text-slate-300">
                        <div className="flex justify-between"><span>Subtotal</span><span>${subtotal}</span></div>
                        <div className="flex justify-between"><span>Tax (15%)</span><span>${tax}</span></div>
                        <div className="flex justify-between border-t border-slate-200 pt-3 font-black text-slate-950 dark:border-white/10 dark:text-white">
                            <span>Total</span><span>${total}</span></div>
                    </div>
                    <button type="button" className="fintech-button mt-6 w-full">
                        Pay with Stripe
                    </button>
                </aside>
            </section>
        </CommerceShell>
    );
}
