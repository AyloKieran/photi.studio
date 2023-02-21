import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

let _now = new Date();
let _date = `${_now.getFullYear()}${(_now.getMonth() + 1).toString().padStart(2, '0')}${_now.getDate().toString().padStart(2, '0')}`;
let _time = `${_now.getHours().toString().padStart(2, '0')}${_now.getMinutes().toString().padStart(2, '0')}${_now.getSeconds().toString().padStart(2, '0')}`;

export default defineConfig({
    define: {
        '__APP_VERSION__': JSON.stringify(`${_date}-${_time}`),
    },
    plugins: [
        laravel({
            input: [
                'resources/css/UI/main.scss',
                'resources/js/app.js',
                'resources/js/register-sw.js'
            ],
            refresh: true,
        }),
    ],
    build: {
        rollupOptions: {
            output: {
                entryFileNames: `assets/[name].js`,
                chunkFileNames: `assets/[name].js`,
                assetFileNames: `assets/[name].[ext]`
            }
        },
    },
    resolve: {
        alias: {
            '@assets': '/resources/assets',
        }
    }
});
