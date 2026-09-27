/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./wp-content/themes/soonchunhyang-tailwind/**/*.php",
    "./wp-content/themes/soonchunhyang-tailwind/assets/js/**/*.js",
    "./*.php",
    "./template-parts/**/*.php",
    "./inc/**/*.php",
    "./assets/js/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        sch: {
          950: '#001438',
          900: '#002057',
          850: '#00296f',
          800: '#00337a',
          700: '#00489f',
          600: '#0b60c6',
          500: '#1a73e8',
          400: '#38bdf8',
          200: '#bae6fd',
          100: '#e0f2fe',
          50: '#f0f9ff'
        },
        accent: {
          cyan: '#1ebbf0',
          cyanLight: '#70d8ff',
          gold: '#f59e0b',
          goldLight: '#fde68a',
          emerald: '#10b981'
        }
      },
      fontFamily: {
        sans: ['"Plus Jakarta Sans"', 'system-ui', '-apple-system', 'sans-serif']
      },
      animation: {
        'pulse-glow': 'pulseGlow 2.5s infinite',
        'float': 'floatAnim 3s ease-in-out infinite'
      },
      keyframes: {
        pulseGlow: {
          '0%, 100%': { boxShadow: '0 0 0 0 rgba(30, 187, 240, 0.4)' },
          '50%': { boxShadow: '0 0 0 14px rgba(30, 187, 240, 0)' }
        },
        floatAnim: {
          '0%, 100%': { transform: 'translateY(0px)' },
          '50%': { transform: 'translateY(-6px)' }
        }
      }
    },
  },
  plugins: [],
}
