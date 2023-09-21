import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import ckeditor5 from "@ckeditor/vite-plugin-ckeditor5";
import { createRequire } from "node:module";
const require = createRequire(import.meta.url);

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/js/app.js", "resources/sass/app.sass","resources/css/app.css"],
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
        ckeditor5({ theme: require.resolve("@ckeditor/ckeditor5-theme-lark") }),
    ],
    // resolve: {
    //     alias: {
    //         "@": fileURLToPath(new URL("./src", import.meta.url)),
    //     },
    // },
});
