<?php
function my_tailwind_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('custom-logo');
    
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'my-tailwind-theme'),
        // === ADDED NEW MENU LOCATION HERE ===
        'secondary_quick_links' => __('Secondary Quick Links', 'my-tailwind-theme'),
        // ====================================
    ));
}
add_action('after_setup_theme', 'my_tailwind_theme_setup');

function my_tailwind_theme_scripts() {
    wp_enqueue_style('my-tailwind-theme-style', get_template_directory_uri() . '/dist/style.css', array(), '1.0.0');
    wp_enqueue_script('my-tailwind-theme-script', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'my_tailwind_theme_scripts');

function my_tailwind_theme_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'my-tailwind-theme'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'my-tailwind-theme'),
        'before_widget' => '<section id="%1$s" class="widget mb-8 %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="text-xl font-bold mb-4">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'my_tailwind_theme_widgets_init');
?>