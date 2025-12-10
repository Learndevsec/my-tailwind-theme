<?php get_header(); ?>

<article class="max-w-4xl mx-auto">
    <?php while (have_posts()) : the_post(); ?>
        <header class="mb-6">
            <h1 class="text-4xl font-bold"><?php the_title(); ?></h1>
        </header>
        
        <?php if (has_post_thumbnail()) : ?>
            <div class="mb-6">
                <?php the_post_thumbnail('large', array('class' => 'w-full h-auto rounded-lg')); ?>
            </div>
        <?php endif; ?>
        
        <div class="prose max-w-none">
            <?php the_content(); ?>
        </div>
        
        <?php
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        ?>
    <?php endwhile; ?>
</article>

<?php get_footer(); ?>
