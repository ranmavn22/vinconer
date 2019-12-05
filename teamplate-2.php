<?php
/*
	Template Name: No banner
	*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header('no-banner'); ?>
<?php
while (have_posts()) : the_post();
    the_content();
endwhile; ?>
<?php get_footer();
