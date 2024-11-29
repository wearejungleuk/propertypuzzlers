/** @type {import('tailwindcss').Config} */
module.exports = {
	content: ['./**/*.php'],
	theme: {
		screens: {
			sm: '576px',
			md: '768px',
			lg: '992px',
			xl: '1200px',
			'2xl': '1400px',
		},
		colors: {
			white: '#FFFFFF',
			black: '#000000',
		},
		borderWidth: {
			DEFAULT: '1px',
			'0': '0',
			'2': '2px',
			'3': '3px',
			'4': '4px',
			'5': '5px',
			'6': '6px',
			'7': '7px',
			'8': '8px',
		},
		extend: {
			screens: {
				'3xl': '1600px',
			},
		},
	},
	corePlugins: {
		container: false,
	},
	plugins: [
		require('flowbite/plugin')
	],
	safelist: ['mix-blend-difference'],
};
