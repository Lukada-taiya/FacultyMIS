import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        screens: {
            sm: { max: "639px" },

            md: { max: "767px" },

            lg: { max: "1023px" },

            xl: { max: "1279px" },
        },
        fontFamily: {
            sans: ["Ubuntu", "Sans-serif"],
        },
        extend: {
            spacing: {
                72: "18rem",
                84: "21rem",
                96: "24rem",
            },
            fontFamily: {
                sans: ["Ubuntu", "Sans-serif"],
            },
            // fontFamily: {
            //     sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            // },
        },
    },

    plugins: [
        forms,
        typography,
        require("tailwindcss-animatecss")({
            settings: {
                animatedSpeed: 1000,
                heartBeatSpeed: 1000,
                hingeSpeed: 2000,
                bounceInSpeed: 750,
                bounceOutSpeed: 750,
                animationDelaySpeed: 1000,
            },
            variants: ["responsive"],
        }),
    ],
};
