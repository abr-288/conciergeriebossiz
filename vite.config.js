import { defineConfig } from 'vite'; 
import vue from '@vitejs/plugin-vue'; 
import react from '@vitejs/plugin-react'; 
import path from 'path'; 
import laravel from '@vitejs/plugin-laravel';

export default defineConfig({ 
plugins: [ 
  laravel([
        'resources/css/app.css',
        'resources/js/app.js',
      ]),
vue(), 
react(), 
], 
resolve: { 
alias: { 
'@': path.resolve(__dirname, 'resources/js'), 
}, 
}, 
build: { 
manifest: true, 
outDir: 'public/build', 
}, 
server: { 
proxy: { 
'/app': 'http://localhost', 
}, 
}, 
}); 