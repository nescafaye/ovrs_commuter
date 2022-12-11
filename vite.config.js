import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/sass/dashboard.scss', 
                'resources/sass/transaction.scss',
                'resources/sass/payment.scss',
                'resources/js/payment.js',
                'resources/sass/modal.scss', 
                'resources/js/dropdown.js', 
                'resources/js/main.js',
                'resources/sass/error.scss',
                'resources/js/login.js',
                'resources/sass/login.scss',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },
});
