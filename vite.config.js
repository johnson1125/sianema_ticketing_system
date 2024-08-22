import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
    server: {
        // Increase the polling interval for file changes
        watch: {
            usePolling: true,
            interval: 1000,
        },
    },
    // Adjust the build options
    build: {
        sourcemap: false, // Disable sourcemaps for faster builds
    },
});
