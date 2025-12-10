<?php get_header(); ?>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <article class="lg:col-span-2">
        <?php while (have_posts()) : the_post(); ?>
            <header class="mb-6">
                <h1 class="text-4xl font-bold mb-2"><?php the_title(); ?></h1>
                <div class="text-gray-600 text-sm">
                    <?php _e('Posted on', 'my-tailwind-theme'); ?> <?php echo get_the_date(); ?> 
                    <?php _e('by', 'my-tailwind-theme'); ?> <?php the_author(); ?>
                </div>
            </header>
            
            <?php if (has_post_thumbnail()) : ?>
                <div class="mb-6">
                    <?php the_post_thumbnail('large', array('class' => 'w-full h-auto rounded-lg')); ?>
                </div>
            <?php endif; ?>
            
            <div class="prose max-w-none mb-8">
                <?php the_content(); ?>
            </div>
            
            <div class="border-t pt-6">
                <?php
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
            </div>
        <?php endwhile; ?>
    </article>
    
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
