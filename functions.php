<?php
/**
 * Tailwind Theme & Sarkari SEO Functions
 */

// =========================================================================
// 1. YOUR ORIGINAL THEME SETUP (Menus, Widgets, Scripts)
// =========================================================================

function my_tailwind_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('custom-logo');
    
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'my-tailwind-theme'),
        'secondary_quick_links' => __('Secondary Quick Links', 'my-tailwind-theme'),
    ));
}
add_action('after_setup_theme', 'my_tailwind_theme_setup');

function my_tailwind_theme_scripts() {
    // Your Tailwind Styles
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


// =========================================================================
// 2. SARKARI SEO: GOOGLE JOBS SCHEMA (JSON-LD)
// =========================================================================
// This requires ACF fields: organization_name, last_date_to_apply, 
// total_vacancy, apply_link, job_location, job_salary

function sarkari_job_schema() {
    // Only run on single blog posts and if ACF is active
    if ( is_single() && function_exists('get_field') ) {
        
        // 1. Fetch Data
        $org_name   = get_field('organization_name');     
        $last_date  = get_field('last_date_to_apply'); // Ensure ACF format is Y-m-d
        $vacancy    = get_field('total_vacancy');         
        $apply_link = get_field('apply_link');            
        $location   = get_field('job_location');          
        $salary     = get_field('job_salary');            

        // 2. Safety Check
        if ( empty($org_name) || empty($last_date) ) {
            return;
        }

        // 3. Clean description
        $clean_desc = wp_strip_all_tags( get_the_excerpt() );
        if( !empty($vacancy) ) {
            $clean_desc .= ' Total Vacancy: ' . $vacancy . '.';
        }

        // 4. Build Schema
        $schema = [
            '@context'      => 'https://schema.org/',
            '@type'         => 'JobPosting',
            'title'         => get_the_title(),
            'description'   => $clean_desc,
            'datePosted'    => get_the_date('Y-m-d'),
            'validThrough'  => $last_date . 'T23:59:59', 
            'employmentType'=> 'FULL_TIME',
            'hiringOrganization' => [
                '@type' => 'Organization',
                'name'  => $org_name,
                'sameAs' => $apply_link ? $apply_link : get_site_url()
            ],
            'jobLocation'   => [
                '@type' => 'Place',
                'address' => [
                    '@type' => 'PostalAddress',
                    'addressLocality' => $location ? $location : 'India', 
                    'addressCountry'  => 'IN'
                ]
            ],
            'baseSalary'    => [
                '@type' => 'MonetaryAmount',
                'currency' => 'INR',
                'value' => [
                    '@type' => 'QuantitativeValue',
                    'value' => $salary ? $salary : 'Best in Industry',
                    'unitText' => 'MONTH'
                ]
            ]
        ];

        // 5. Output
        echo '<script type="application/ld+json">' . json_encode($schema) . '</script>' . "\n";
    }
}
add_action('wp_head', 'sarkari_job_schema');


// =========================================================================
// 3. SARKARI SHORTCODE: [job_overview]
// =========================================================================
// Displays a summary table at the top of your post.

function sarkari_overview_shortcode() {
    if ( !function_exists('get_field') || !get_field('organization_name') ) {
        return '';
    }

    $org_name = get_field('organization_name');
    $vacancy  = get_field('total_vacancy');
    $last_date = get_field('last_date_to_apply');
    $fee      = get_field('application_fee');
    $link     = get_field('apply_link');

    // Using inline styles to ensure it works instantly. 
    // You can replace these with Tailwind classes (e.g., class="bg-blue-100 p-4") later.
    $html = '
    <div class="sarkari-table-box" style="border: 2px solid #0073aa; border-radius: 8px; overflow: hidden; margin: 20px 0;">
        <div style="background: #0073aa; color: #fff; padding: 10px 15px; font-weight: bold; font-size: 18px;">
            Job At A Glance
        </div>
        <table style="width: 100%; border-collapse: collapse; margin:0;">
            <tr style="border-bottom: 1px solid #ddd;"><td style="padding: 10px; background: #f4f4f4; width: 40%; font-weight:bold;">Organization</td><td style="padding: 10px;">' . $org_name . '</td></tr>
            <tr style="border-bottom: 1px solid #ddd;"><td style="padding: 10px; background: #f4f4f4; font-weight:bold;">Total Vacancy</td><td style="padding: 10px;">' . $vacancy . '</td></tr>
            <tr style="border-bottom: 1px solid #ddd;"><td style="padding: 10px; background: #f4f4f4; font-weight:bold;">Application Fee</td><td style="padding: 10px;">' . $fee . '</td></tr>
            <tr style="border-bottom: 1px solid #ddd;"><td style="padding: 10px; background: #f4f4f4; font-weight:bold;">Last Date</td><td style="padding: 10px; color: #d9534f; font-weight: bold;">' . $last_date . '</td></tr>
        </table>
        <div style="padding: 15px; text-align: center; background: #f9f9f9;">
            <a href="' . $link . '" target="_blank" style="background: #28a745; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 5px; font-weight: bold; display: inline-block;">Apply Online Now</a>
        </div>
    </div>';

    return $html;
}
add_shortcode('job_overview', 'sarkari_overview_shortcode');

// =========================================================================
// 4. EXTRA: Speed Optimization
// =========================================================================
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

?>