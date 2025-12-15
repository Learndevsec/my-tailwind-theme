</main>

<footer class="bg-gray-800 text-white mt-12">
    <div class="container mx-auto px-4 py-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 pb-8 border-b border-gray-700">
            
            <div>
                <h3 class="text-lg font-semibold text-yellow-400 mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="/" class="text-gray-300 hover:text-white transition duration-300">Home</a></li>
                    <li><a href="/latest-jobs" class="text-gray-300 hover:text-white transition duration-300">Latest Jobs</a></li>
                    <li><a href="/admit-card-result" class="text-gray-300 hover:text-white transition duration-300">Admit Card / Result</a></li>
                    <li><a href="/answer-key" class="text-gray-300 hover:text-white transition duration-300">Answer Key</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-yellow-400 mb-4">Legal & Info</h3>
                <ul class="space-y-2">
                    <li><a href="/about-us" class="text-gray-300 hover:text-white transition duration-300">About Us</a></li>
                    <li><a href="/privacy-policy" class="text-gray-300 hover:text-white transition duration-300">Privacy Policy</a></li>
                    <li><a href="/disclaimer" class="text-gray-300 hover:text-white transition duration-300">Disclaimer</a></li>
                    <li><a href="/contact" class="text-gray-300 hover:text-white transition duration-300">Contact Us</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-yellow-400 mb-4">Connect With Us</h3>
                <p class="mb-4 text-gray-300">Info@sarkariexam.com</p>
                <div class="flex space-x-3">
                    <a href="#" class="text-gray-300 hover:text-white bg-gray-700 p-2 rounded-full transition duration-300" aria-label="Facebook">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"></svg>
                        F
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white bg-gray-700 p-2 rounded-full transition duration-300" aria-label="Twitter">
                         <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"></svg>
                        T
                    </a>
                    </div>
            </div>

        </div>

        <div class="text-center pt-6 text-gray-400">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('All rights reserved.', 'my-tailwind-theme'); ?></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>