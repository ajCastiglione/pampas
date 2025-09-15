import { defineConfig } from "vite";
import sassGlobImports from "vite-plugin-sass-glob-import";
import liveReload from "vite-plugin-live-reload";
import path from "path";
import fg from "fast-glob";

// Dynamically find all CSS files in blocks directory
const blockCssFiles = fg.sync( ["library/css/blocks/*.css"], { cwd: __dirname, absolute: true } );

export default defineConfig( {
    plugins: [sassGlobImports(), liveReload( __dirname + "/**/*.php" )],
    base: "/",
    build: {
        manifest: true,
        sourcemap: true,
        rollupOptions: {
            input: {
                main: path.resolve( __dirname, "library/js/index.js" ),
                ...blockCssFiles.reduce( ( entries, file ) => {
                    // Use the filename (without extension) as the entry key
                    const name = path.basename( file, path.extname( file ) );
                    entries[name] = file;
                    return entries;
                }, {} ),
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
