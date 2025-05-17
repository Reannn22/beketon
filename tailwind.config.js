/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                // 'primary': '#50790B',
                // 'secondary': '#A4C639',
                // 'goldenbrown' : '#CA872C',
                // 'green' : "#50790B",
            },
        },
    },
    plugins: [],
};