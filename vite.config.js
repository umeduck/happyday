import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
  base: 'https://aniva.umeduck.com/',
  // server: {
  //   https: true,
  // },
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
