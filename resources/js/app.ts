/// <reference types="vite/client" />
import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import "../css/app.css";
import PrimeVue from 'primevue/config';
import InputText from "primevue/inputtext";
import Checkbox from "primevue/checkbox";
import Button from "primevue/button";
import "primevue/resources/themes/lara-light-blue/theme.css";
import "primeicons/primeicons.css";
import "primeflex/primeflex.css";

createInertiaApp({
    title: (title: string) => `${title} - Hostel Management System`,
    resolve: (name: string) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, App, props, plugin }) {
        const vueApp = createApp({ render: () => h(App, props) });
        vueApp.use(plugin);
        vueApp.use(PrimeVue);
        vueApp.component("InputText", InputText);
        vueApp.component("Checkbox", Checkbox);
        vueApp.component("Button", Button);
        vueApp.mount(el);
    },
}); 