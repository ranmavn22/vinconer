<?php
/**
 * The Template for displaying all single posts.
 *
 * @package GeneratePress
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header(); ?>

    <div class="tintuc">
        <div class="wrapper1k2">
            <?php while (have_posts()) : the_post(); ?>
                <div class="detail">
                    <p class="time"><?php echo get_the_date('d/m/Y') ?></p>
                    <h1><?php the_title() ?></h1>
                    <div class="noidung">
                        <?php the_content() ?>
                    </div><!--end noidung-->
                    <?php
                    $tags = wp_get_post_tags(get_the_ID());
                    $tag_ids = array();
                    foreach ($tags as $tag) {
                        if ($tag->slug != "portrait" && $tag->slug != "landscape") {
                            $tag_ids[] = (int)$tag->term_id;
                        }
                    }
                    $loop = new WP_Query(
                        array(
                            'posts_per_page' => 6,
                            'tag__in' => $tag_ids,
                            'post_type' => 'post',
                            'orderby' => 'rand',
                            'post__not_in' => array($post->ID)
                        )
                    );
                    wp_reset_query();
                    if ($loop) {
                        ?>
                        <div class="tinlienquan">
                            <h2>Tin liên quan</h2>
                            <ul>
                                <?php
                                while ($loop->have_posts()) : $loop->the_post();
                                    ?>
                                    <li><a href="<?php echo get_permalink($post->ID) ?>"
                                           title="<?php the_title() ?>"><?php the_title() ?></a></li>
                                <?php
                                endwhile;
                                ?>
                            </ul>
                        </div><!--end tinlienquan-->
                    <?php } ?>
                </div><!--end details-->
            <?php endwhile; ?>
            <div class="dstintuc">
                <?php
                $loop = new WP_Query(
                    array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                        'category_name' => 'tin-tuc-su-kien')
                );
                while ($loop->have_posts()) : $loop->the_post();
                    include __DIR__ . '/includes/item_post.php';
                endwhile;
                wp_reset_query();
                ?>
            </div><!--end dstintuc-->
        </div>
    </div><!--end tintuc-->

<?php
get_footer();
