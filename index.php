<?php get_header(); ?>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2">
        <?php if (have_posts()) : ?>
            <div class="space-y-8">
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('template-parts/content'); ?>
                <?php endwhile; ?>
            </div>
            
            <div class="mt-8 flex justify-between">
                <div><?php previous_posts_link(__('&laquo; Newer Posts', 'my-tailwind-theme')); ?></div>
                <div><?php next_posts_link(__('Older Posts &raquo;', 'my-tailwind-theme')); ?></div>
            </div>
        <?php else : ?>
            <p class="text-gray-600"><?php _e('No posts found.', 'my-tailwind-theme'); ?></p>
        <?php endif; ?>
    </div>
    
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
