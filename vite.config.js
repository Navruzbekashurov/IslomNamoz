// vite.config.js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/main.scss',
                'resources/js/app.js',
                'resources/js/codebase/app.js',
                'resources/js/dark-mode.js',
            ],
            refresh: true,
        }),
    ],
});
