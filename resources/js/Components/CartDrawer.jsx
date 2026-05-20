import { useCommerceStore } from "@/Stores/useCommerceStore";
import { router } from "@inertiajs/react";
import React from "react";

export default function CartDrawer() {


    // راجع CheckoutController الذي يستقبل البيانات من هذا المكون

    // import current state from Zustand
    const { cart, isCartOpen, toggleCart, removeFromCart, updateQuantity } = useCommerceStore();



    // Subtotal
    const subtotal = Number(cart.reduce((acc, item) => acc + (item.price_amount * item.quantity), 0).toFixed(2));


    // send the data to checkout page
    const handleCheckout = (e) => {
        e.preventDefault();

        const orderItems = cart.map(item => ({
            id: item.id,
            quantity: item.quantity,
        }));

        router.post('/checkout', { items: orderItems }, {
            onSuccess: () => {
                toggleCart();
            },
            onError: (errors) => {
                //Todo: turn it to notification system
                console.log("فشل الانتقال للدفع:", errors);
            }
        })
    }

    // cart already open 
    if (!isCartOpen) return null;

    // open cart 
    return (
        <div className="fixed inset-0 z-50 overflow-hidden">
            {/* (Backdrop) */}
            <div
                className="absolute inset-0 bg-slate-950/40 backdrop-blur-sm transition-opacity"
                onClick={toggleCart} //  close the cart when click on backdrop 
            />

            <div className="absolute inset-y-0 right-0 flex max-w-full pl-10">
                {/* cart */}
                <div className="w-screen max-w-md transform border-l border-white/10 bg-white/80 p-6 shadow-2xl backdrop-blur-xl transition dark:bg-slate-900/80">
                    <div className="flex h-full flex-col">
                        {/* (Header) */}
                        <div className="flex items-center justify-between border-b border-slate-200 pb-5 dark:border-white/10">
                            <h2 className="text-lg font-black text-slate-950 dark:text-white flex items-center gap-2">
                                🛒 Shopping Cart
                                <span className="rounded-full bg-cyan-500/20 px-2.5 py-0.5 text-xs font-black text-cyan-600 dark:text-cyan-400">
                                    {/* Number of unique items in the cart*/}
                                    {cart.length}
                                </span>
                            </h2>
                            <button
                                type="button"
                                className="text-slate-400 hover:text-slate-500 dark:hover:text-slate-200"
                                onClick={toggleCart}
                            >
                                <span className="sr-only">Close panel</span>✕
                            </button>
                        </div>

                        {/* (Items List) */}
                        <div className="flex-1 overflow-y-auto py-5">
                            {cart.length === 0 ? (
                                <div className="flex h-full flex-col items-center justify-center text-center">
                                    <span className="text-4xl">🛍️</span>
                                    <p className="mt-4 text-sm font-bold text-slate-500 dark:text-slate-400">
                                        سلتك فارغة حالياً
                                    </p>
                                    <p className="mt-2 text-xs text-slate-400 dark:text-slate-500">
                                        أضف بعض المنتجات الرائعة من المعرض لبدء
                                        التسوق!
                                    </p>
                                </div>
                            ) : (
                                <div className="space-y-4">
                                    {/* TODO: قم بعمل map لمصفوفة السلة (cart) لإنشاء عناصر السلة بشكل ديناميكي */}
                                    {cart.map((item) => (
                                        <div
                                            key={item.id}
                                            className="flex items-center gap-4 rounded-xl border border-slate-200/60 bg-white/50 p-3 dark:border-white/5 dark:bg-white/5"
                                        >
                                            {/* صورة صغيرة ملونة معبرة عن المنتج */}
                                            <div
                                                className={`h-16 w-16 flex-shrink-0 rounded-lg bg-gradient-to-br ${item.accent || "from-cyan-400 to-lime-300"}`}
                                            />

                                            {/* تفاصيل المنتج */}
                                            <div className="flex-1 min-w-0">
                                                <p className="text-[10px] font-black uppercase tracking-wider text-cyan-600 dark:text-cyan-400">
                                                    {item.vendor}
                                                </p>
                                                <h4 className="text-sm font-black text-slate-950 dark:text-white truncate">
                                                    {item.name}
                                                </h4>
                                                <p className="mt-1 text-xs font-black text-slate-900 dark:text-white">
                                                    {item.price_currency || "$"}
                                                    {item.price_amount}
                                                </p>
                                            </div>

                                            {/* التحكم في الكميات والحذف */}
                                            <div className="flex flex-col items-end gap-2">
                                                <div className="flex items-center gap-2 rounded-lg border border-slate-200 bg-white p-1 dark:border-white/10 dark:bg-slate-950">
                                                    {/* زر إنقاص الكمية */}
                                                    <button
                                                        type="button"
                                                        className="px-2 text-xs font-bold hover:text-cyan-500"
                                                        onClick={() =>
                                                            updateQuantity(
                                                                item.id,
                                                                item.quantity -
                                                                1,
                                                            )
                                                        }
                                                    >
                                                        -
                                                    </button>
                                                    <span className="text-xs font-bold w-4 text-center">
                                                        {item.quantity}
                                                    </span>
                                                    {/* حقل إدخال ذكي يتيح الكتابة المباشرة */}
                                                    {/* <input
                                                        type="number"
                                                        value={item.quantity}
                                                        className="w-10 text-center text-xs font-bold bg-transparent border-none focus:outline-none [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                                                        onChange={(e) => updateQuantity(item.id, Number(e.target.value))}
                                                    /> */}
                                                    {/* زر زيادة الكمية */}
                                                    <button
                                                        type="button"
                                                        className="px-2 text-xs font-bold hover:text-cyan-500"
                                                        onClick={() =>
                                                            updateQuantity(
                                                                item.id,
                                                                item.quantity +
                                                                1,
                                                            )
                                                        }
                                                    >
                                                        +
                                                    </button>
                                                </div>

                                                {/* زر حذف العنصر */}
                                                <button
                                                    type="button"
                                                    className="text-xs text-rose-500 hover:underline"
                                                    onClick={() =>
                                                        removeFromCart(item.id)
                                                    }
                                                >
                                                    Remove
                                                </button>
                                            </div>
                                        </div>
                                    ))}
                                </div>
                            )}
                        </div>

                        {/* (Footer & Checkout button) */}
                        {cart.length > 0 && (
                            <div className="border-t border-slate-200 pt-5 dark:border-white/10 space-y-4">
                                <div className="flex justify-between text-base font-black text-slate-950 dark:text-white">
                                    <span>Subtotal</span>
                                    <span>${subtotal}</span>
                                </div>
                                <p className="text-xs text-slate-500 dark:text-slate-400 leading-normal">
                                    * سيتم حساب الضرائب ومصاريف الشحن بشكل آمن
                                    في الخطوة التالية.
                                </p>

                                {/* زر الانتقال للدفع */}

                                <button
                                    type="button"
                                    className="fintech-button w-full text-center cursor-pointer py-3 rounded-xl"
                                    onClick={handleCheckout}
                                >
                                    Proceed to Checkout
                                </button>
                            </div>
                        )}
                    </div>
                </div>
            </div>
        </div>
    );
}
