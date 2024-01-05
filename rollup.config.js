import postcss from "rollup-plugin-postcss";
import terser from "@rollup/plugin-terser";
import copy from "rollup-plugin-copy";

export default {
  input: "src/client/index.js",
  output: {
    file: "htdocs/client.js",
    format: "iife",
    sourcemap: false,
  },
  plugins: [
    postcss({
      extract: "style.css",
      minimize: true,
    }),
    terser(),
    copy({
      targets: [
        { src: "src/media", dest: "htdocs" },
        { src: "src/server", dest: "htdocs" },
        { src: "src/template", dest: "htdocs" },
        { src: "index.php", dest: "htdocs" },
        { src: "php.ini", dest: "htdocs" },
      ],
      verbose: true,
    }),
  ],
};
