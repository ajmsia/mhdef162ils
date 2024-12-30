import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js'), // Alias for easier imports
        },
    },
    build: {
        outDir: 'public/build', // Output directory for compiled assets
        manifest: true, // Generate the manifest file for Laravel integration
    },
    server: {
        proxy: {
            '/app': 'http://localhost', // Optional: adjust if you're using a specific backend
        },
    },
});

