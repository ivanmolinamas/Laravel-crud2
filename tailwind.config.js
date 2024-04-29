import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            height:{
                "header":"15vh", //tamaño de la cabecera
                "nav":"8vh", //tamaño de la barra del navegador
                "main":"66vh", //tamao del contenido
                "footer":"10vh", //tamaño del footer
                "logo":"60px", //tamaño altura del logo
            },
            colors:{
              "header":"#E9F1FA",
              "nav":"#00ABE4",
              "footer":"#2f2f2f",
              "blanco":"#FFFFFF",
            },
            width:{
                "logo":"240px", //tamaño del logotipo
            }
        },
    },

    plugins: [forms, require("daisyui")],
};
