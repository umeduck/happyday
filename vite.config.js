import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
  build: {
    base: 'https://aniva.umeduck.com/',
    assetsDir: 'assets',
    define: {
      'process.env.PROTOCOL': JSON.stringify(process.env.PROTOCOL || 'http'),
    },
  },
  server: {
    https: true,
  },
  plugins: [
    laravel({
      input: 'resources/js/app.js',
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
});
