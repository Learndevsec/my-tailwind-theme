/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './**/*.php',
    './assets/**/*.js',
    // If you ever use a custom template file, add it here
  ],
  safelist: [
    // 1. Layout & Grid (Crucial for the "Action Center" look)
    'max-w-4xl', 'mx-auto', 'my-8', 'grid', 'grid-cols-1', 'md:grid-cols-2', 'md:grid-cols-3', 'gap-2', 'gap-3', 'gap-4', 'flex', 'items-center', 'justify-between', 'justify-center',
    
    // 2. Backgrounds & Hover States (The "Button" colors)
    'bg-blue-50', 'bg-blue-600', 'hover:bg-blue-100', 'hover:bg-blue-700',
    'bg-green-50', 'bg-green-600', 'hover:bg-green-100', 'hover:bg-green-700',
    'bg-purple-50', 'bg-purple-600', 'hover:bg-purple-100', 'hover:bg-purple-700',
    'bg-orange-50', 'bg-orange-600', 'bg-gray-50', 'bg-gray-100', 'bg-gray-700',
    
    // 3. Borders & Radius (The "Modern" feel)
    'border', 'border-b', 'border-t', 'border-gray-100', 'border-gray-200', 'border-blue-200', 'border-green-200', 'border-purple-200',
    'rounded-lg', 'rounded-xl', 'rounded-full',
    
    // 4. Typography & Icons
    'text-xs', 'text-sm', 'text-lg', 'text-xl', 'text-2xl', 'font-bold', 'font-semibold', 'uppercase', 'tracking-tight',
    'text-gray-500', 'text-gray-700', 'text-gray-800', 'text-white', 'text-blue-700', 'text-green-700', 'text-purple-700', 'text-orange-800', 'text-red-600',
    
    // 5. Dark Mode Classes (Crucial for mobile users at night)
    'dark:bg-gray-800', 'dark:bg-gray-900', 'dark:bg-gray-700', 'dark:border-gray-600', 'dark:border-gray-700', 'dark:text-white', 'dark:text-gray-200', 'dark:text-gray-300', 'dark:text-gray-400',
    'dark:bg-green-900/20', 'dark:bg-blue-900/20', 'dark:bg-purple-900/20', 'dark:bg-orange-900/10',
    
    // 6. Animations & Effects
    'shadow-md', 'shadow-lg', 'transition-all', 'transition-transform', 'hover:scale-105', 'hover:scale-110', 'group', 'hover:shadow-lg'
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}