import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
const colors = require("tailwindcss/colors");

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            screens: {
                sm: "480px",
                md: "768px",
                lg: "976px",
                xl: "1440px",
            },
            colors: {
                admin: colors.neutral,
                "sianema-green": "var(--sianema-green)",
                "button-green": "var(--button-green)",
                "button-lighter-green": "var(--button-lighter-green)",
            },
            fontFamily: {
                sans: ["Calibri", "sans-serif"],
                serif: ["Calibri", "serif"],
            },
            extend: {
                spacing: {
                    128: "32rem",
                    144: "36rem",
                },
                borderRadius: {
                    "4xl": "2rem",
                },
            },
        },
    },

    plugins: [
        require("flowbite/plugin")({
            datatables: true,
        }),
    ],
    darkMode: "false",
};
