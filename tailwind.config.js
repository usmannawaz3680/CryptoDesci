import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                crypto: {
                    primary: "#dfff00",
                    // primary: "#f0bb0b",
                    accent: "#131314",
                },
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
