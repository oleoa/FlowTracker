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
        "primary": {
          100: "#00b4d8",
          200: "#FF2C6A",
          300: "#7209b7",
        },
        "secondary": {
          100: "#16161D",
          200: "#404048",
        },
      },
    },
  },
  plugins: [],
}
