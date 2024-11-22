import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/js/app.js'], // Main input files
            refresh: true, // Enables auto-reload for PHP changes
        }),
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, './resources/js'),
        },
    },
    server: {
        host: '127.0.0.1',
        port: 5173, // Vite's default port
        proxy: {
            '^/(?!resources|js|css|images|fonts|build)': {
                target: 'http://127.0.0.1:8000', // Laravel backend
                changeOrigin: true,
                secure: false,
            },
        },
    },
});
