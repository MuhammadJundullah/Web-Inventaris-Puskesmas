import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import react from "@vitejs/plugin-react"; // Tambahkan ini

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.tsx", // Pastikan ini saja
            ],
            refresh: true,
        }),
        react(), // Pastikan plugin React dipanggil di sini
    ],
});
