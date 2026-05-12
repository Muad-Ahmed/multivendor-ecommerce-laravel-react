import { create } from 'zustand';

// TODO: أنشئ Zustand store كطبقة حالة خفيفة للواجهة فقط، ولا تضع فيه قواعد عمل يجب أن تبقى في Laravel.
// TODO: ابدأ بحالات بسيطة مثل theme و cartDraft و dashboardFilters حتى تتعلم فصل حالة الواجهة عن بيانات السيرفر.
// TODO: اجعل كل action صغيرة ومسمّاة بوضوح مثل toggleTheme أو addDraftCartItem حتى يسهل اختبارها وفهمها.
// TODO: عند ربط السلة الحقيقية، اجعل السيرفر مصدر الحقيقة للأسعار والمخزون، واستخدم Zustand فقط لتجربة المستخدم المؤقتة.
export const useCommerceStore = create(() => ({
    // TODO: اكتب هنا القيم الابتدائية للثيم والسلة المؤقتة والفلاتر.
    // TODO: اكتب هنا actions الخاصة بتحديث الثيم والسلة المؤقتة.
}));
