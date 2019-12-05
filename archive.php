<?php
/**
 * The template for displaying Archive pages.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$obj = get_queried_object();
get_header(); ?>
    <div class="tintuc">
        <div class="wrapper1k2">
            <h1><?php echo $obj->name;?></h1>
            <div class="dstintuc">
                <?php
                $loop = new WP_Query(
                    array(
                            'post_type' => 'post',
                            'posts_per_page' => 9,
                            'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                            'category_name' => $obj->slug)
                );
                while ($loop->have_posts()) : $loop->the_post();
                    include __DIR__.'/includes/item_post.php';
                endwhile; ?>
            </div>
            <ul class="paging">
                    <?php
                    $big = 999999999; // need an unlikely integer
                    echo paginate_links(array(
                        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                        'format' => '?paged=%#%',
                        'mid_size' => 1,
                        'current' => max(1, get_query_var('paged')),
                        'total' => $loop->max_num_pages,
                        'prev_next' => false,
                    ));
                    ?>
            </ul>
        </div>
    </div>





<?php
get_footer();
