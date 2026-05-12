import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/react';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createRoot } from 'react-dom/client';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

// TODO: قبل تفعيل الوضع المظلم من Zustand، اقرأ تفضيل المستخدم من localStorage ثم طبقه على document.documentElement.
// TODO: اربط هذا السطر لاحقا بمتجر Zustand حتى يكون تغيير الثيم مركزيا وقابلا لإعادة الاستخدام في كل الواجهات.
document.documentElement.classList.toggle(
    'dark',
    localStorage.theme === 'dark' ||
        (!('theme' in localStorage) &&
            window.matchMedia('(prefers-color-scheme: dark)').matches),
);

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.jsx`,
            import.meta.glob('./Pages/**/*.jsx'),
        ),
    setup({ el, App, props }) {
        const root = createRoot(el);

        root.render(<App {...props} />);
    },
    progress: {
        color: '#4B5563',
    },
});
