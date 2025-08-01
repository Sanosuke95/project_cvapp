import js from "@eslint/js";
import globals from "globals";
import pluginReact from "eslint-plugin-react";
import eslintPluginPrettier from "eslint-plugin-prettier";
import { defineConfig } from "eslint/config";
import eslintConfigPrettier from "eslint-config-prettier";

export default defineConfig([
    {
        files: ["**/*.{js,mjs,cjs,jsx}"],
        plugins: {
            js,
            eslintPluginPrettier,
            pluginReact,
            eslintConfigPrettier,
        },
        extends: [
            "js/recommended",
            "plugin:prettier/recommended",
            "plugin:react/recommended",
        ],
        languageOptions: {
            parserOptions: { ecmaFeatures: { jsx: true } },
            ...globals.browser,
        },
    },
    pluginReact.configs.flat.recommended,
    eslintPluginPrettier,
]);
