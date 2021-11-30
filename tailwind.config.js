module.exports = {
  purge: {
    content: [
        './app/**/*.php',
        './resources/**/*.html',
        './resources/**/*.js',
        './resources/**/*.jsx',
        './resources/**/*.ts',
        './resources/**/*.tsx',
        './resources/**/*.php',
        './resources/**/*.vue',
        './resources/**/*.twig',
    ],
    options: {
        defaultExtractor: (content) => content.match(/[\w-/.:]+(?<!:)/g) || [],
        whitelistPatterns: [/-active$/, /-enter$/, /-leave-to$/, /show$/],
    },
  },
  darkMode: 'class', // or 'media' or 'class'
  theme: {
    extend: {
        colors: {
            'rose': '#F45866',
            'bone': '#DDD8C4',
            'raisin': '#2D2D34',
            'glaucous': '#6F8AB7',
            'moss': '#748E54',
            'jet': '#323031',
        },
    },
  },
  variants: {
    extend: {
        backgroundColor: ['active'],
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
    require('tailwind-scrollbar'),
  ],
}
