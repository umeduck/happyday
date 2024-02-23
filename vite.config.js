import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import vitePluginHttps from 'vite-plugin-https';

export default defineConfig({
  build: {
    base: '/',
  },
  define: {
    'process.env.PROTOCOL': JSON.stringify(process.env.PROTOCOL || 'http'),
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
    vitePluginHttps()
  ],
});
