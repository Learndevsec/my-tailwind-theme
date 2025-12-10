<aside class="lg:col-span-1">
    <?php if (is_active_sidebar('sidebar-1')) : ?>
        <?php dynamic_sidebar('sidebar-1'); ?>
    <?php else : ?>
        <div class="bg-gray-100 p-6 rounded-lg">
            <h2 class="text-xl font-bold mb-4"><?php _e('Sidebar', 'my-tailwind-theme'); ?></h2>
            <p class="text-gray-600"><?php _e('Add widgets to this sidebar in the WordPress admin.', 'my-tailwind-theme'); ?></p>
        </div>
    <?php endif; ?>
</aside>
