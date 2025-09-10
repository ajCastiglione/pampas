module.exports = {
    env: {
        browser: true,
        es2021: true,
    },
    extends: ["prettier"],
    overrides: [],
    parserOptions: {
        ecmaVersion: "latest",
        sourceType: "module",
    },
    rules: {
        indent: ["error", 4],
        quotes: ["error", "double"],
        semi: ["error", "always"],
        "space-in-parens": ["error", "always"],
        "object-curly-spacing": ["error", "always"],
    },
};
