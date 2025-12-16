<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="bg-gray-900 text-white text-sm">
    <div class="container mx-auto px-4 py-2 flex items-center justify-between">
        
        <a href="#subscribe-link" class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-xs transition duration-300">
            <span class="mr-1">🔥</span> GET FREE Job Alerts
        </a>
        
        <div class="flex items-center space-x-4">
            <a href="/contact" class="hover:text-yellow-400 hidden sm:block">Contact Us</a>
            <div class="flex space-x-2">
                <a href="?lang=hi" class="hover:text-yellow-400">हिन्दी</a>
                <span>/</span>
                <a href="?lang=en" class="hover:text-yellow-400">English</a>
            </div>
            
            <button class="text-white hover:text-yellow-400 focus:outline-none" aria-label="Search">
                 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </button>
        </div>
    </div>
</div>

<header class="bg-white shadow-md">
    <nav class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between">
            
            <div class="text-2xl font-bold">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="text-blue-600 hover:text-blue-800">
                        <?php bloginfo('name'); ?>
                    </a>
                <?php endif; ?>
                <p class="text-xs text-gray-500 font-normal">Latest Govt Jobs, Results & Admit Cards</p>
            </div>
            
            <button id="mobile-menu-toggle" class="lg:hidden text-gray-700 focus:outline-none" aria-label="Toggle menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            
            <div id="primary-menu" class="hidden lg:block">
                <?php
                // NOTE: You will need to make sure your WordPress menu ('primary') contains the links: Latest Jobs, Admit Card, Result, Answer Key, Syllabus, and Categories (as a parent link).
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'flex space-x-6 text-base font-semibold',
                    'fallback_cb' => false,
                ));
                ?>
            </div>
        </div>
        
        <div id="mobile-menu" class="hidden lg:hidden mt-4">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'flex flex-col space-y-2 text-base',
                'fallback_cb' => false,
            ));
            ?>
        </div>
    </nav>
</header>

<div class="bg-white border-b border-gray-200 sticky top-0 z-10 hidden md:block">
    <div class="container mx-auto px-4 py-2">
        <?php 
        // NOTE: This menu should contain your most popular quick filters (e.g., 10th Pass, Banking, State PSC)
        wp_nav_menu(array(
            'theme_location' => 'secondary_quick_links', // You need to register this location in functions.php
            'container' => false,
            'menu_class' => 'flex space-x-6 text-sm',
            'fallback_cb' => false,
        ));
        ?>
    </div>
</div>


<main class="container mx-auto px-4 py-8">