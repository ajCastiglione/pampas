import { defineConfig } from "vite";
import sassGlobImports from "vite-plugin-sass-glob-import";
import liveReload from "vite-plugin-live-reload";
import path from "path";

export default defineConfig( {
    plugins: [sassGlobImports(), liveReload( __dirname + "/**/*.php" )],
    base: "/",
    build: {
        manifest: true,
        sourcemap: true,
        rollupOptions: {
            input: {
                main: path.resolve( __dirname, "library/js/index.js" ),
            },
            output: {
                assetFileNames: "[name][extname]",
                entryFileNames: "index.js",
            },
        },
        write: true,
        minify: true,
    },
    resolve: {
        alias: {
            "@": path.resolve( __dirname, "library" ),
        },
    },
    server: {
        cors: true,
        strictPort: true,
        https: false,
        hmr: {
            host: "localhost",
        },
    },
    css: {
        devSourcemap: true,
    },
} );
