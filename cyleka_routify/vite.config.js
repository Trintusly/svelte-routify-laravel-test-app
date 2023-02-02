import { svelte } from '@sveltejs/vite-plugin-svelte'
import routify from '@roxi/routify/vite-plugin'
import { defineConfig } from 'vite'
import { mdsvex } from 'mdsvex'
import sveltePreprocess from 'svelte-preprocess';
import * as path from 'path';

const production = process.env.NODE_ENV === 'production'

export default defineConfig({
    clearScreen: false,

    plugins: [
        routify({
            devHelper: !production,
        }),
        svelte({
            emitCss: false,
            compilerOptions: {
                dev: !production,
            },
            extensions: ['.md', '.svelte'],
            preprocess: [mdsvex({ extension: 'md' }), sveltePreprocess()],
        }),
    ],
    resolve: {
        alias: {
            '$app': path.resolve(__dirname, 'src/'),
        },
    },
    server: { port: 1337 },
})
