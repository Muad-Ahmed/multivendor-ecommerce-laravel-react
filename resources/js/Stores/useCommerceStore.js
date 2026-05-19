import { create } from 'zustand';
import { persist } from 'zustand/middleware';

export const useCommerceStore = create(
    persist(
        (set, get) => ({


            // cart items structure: { id, name, vendor, price_amount, price_currency, quantity, accent }
            cart: [],
            isCartOpen: false,
            // theme
            theme: 'light',


            // Theme actions: 
            toggleTheme: () => set((state) => ({
                theme: state.theme === 'light' ? 'dark' : 'light'
            })),


            // Cart actions: 
            // toggle
            toggleCart: () => set((state) => ({ isCartOpen: !state.isCartOpen })),

            // add
            addToCart: (product) => set((state) => {
                const isExist = state.cart.some((p) => p.id === product.id)

                if (isExist) {
                    return {
                        cart: state.cart.map((p) => p.id === product.id ? { ...p, quantity: p.quantity + 1 } : p)
                    };
                }

                return {
                    cart: [...state.cart, { ...product, quantity: 1 }]
                }
            }),

            // remove
            removeFromCart: (productId) => set((state) => ({
                cart: state.cart.filter((p) => p.id !== productId)
            })),

            // update
            updateQuantity: (productId, newQuantity) =>
                set((state) => {
                    const validQuantity = newQuantity > 0 ? newQuantity : 1;
                    return {
                        cart: state.cart.map((p) =>
                            p.id === productId
                                ? { ...p, quantity: validQuantity }
                                : p
                        )
                    }
                }),

            // Clear cart: called after successful checkout/payment process
            clearCart: () => set({ cart: [] }),

        }),

        {
            name: 'commerce-store', // Unique key for the localStorage item
            // Specify which fields to persist in localStorage
            partialize: (state) => ({
                cart: state.cart,
                theme: state.theme,
            }),
        }
    )
);
