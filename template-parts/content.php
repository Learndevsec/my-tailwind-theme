<article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-lg shadow-md overflow-hidden'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('medium_large', array('class' => 'w-full h-64 object-cover')); ?>
        </a>
    <?php endif; ?>
    
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-2">
            <a href="<?php the_permalink(); ?>" class="text-gray-900 hover:text-blue-600">
                <?php the_title(); ?>
            </a>
        </h2>
        
        <div class="text-gray-600 text-sm mb-4">
            <?php echo get_the_date(); ?> | <?php the_author(); ?>
        </div>
        
        <div class="text-gray-700 mb-4">
            <?php the_excerpt(); ?>
        </div>
        
        <a href="<?php the_permalink(); ?>" class="text-blue-600 hover:text-blue-800 font-semibold">
            <?php _e('Read More &rarr;', 'my-tailwind-theme'); ?>
        </a>
    </div>
</article>
