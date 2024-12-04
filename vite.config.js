import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    build: {
        // Menentukan output direktori hasil build
        outDir: 'public/dist', // Folder utama untuk output build
        assetsDir: 'assets',    // Folder untuk menyimpan file assets seperti .js, .css
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
