/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                dark: "#363B45",
                bg: "#F5F8FE",
                secondary: "#7E889C",
                table: "#EAF0FD",
                danger: "#FF6868",
                accent: "#605CFF",
            },
            fontSize: {
                small: "0.7rem",
                title: "2rem",
                body: "0.875rem",
            },
        },
    },
    plugins: [],
};
