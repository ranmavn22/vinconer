<div class="item">
    <a href="<?php echo get_permalink($post->ID)?>" class="imgBox" title="<?php the_title()?>">
        <?php echo get_the_post_thumbnail($post->ID, 'post_thumbnail', array('alt' => $post->post_title)) ?></a>
    <div class="noidung">
        <p class="time"><?php echo get_the_date('d/m/Y')?></p>
        <h2><a href="<?php echo get_permalink($post->ID)?>" title="<?php the_title()?>"><?php the_title()?></a></h2>
        <p class="mota">
            <?php
            if($post->post_excerpt)
                echo $post->post_excerpt;
            else{
                echo wp_trim_words($post->post_content,16);
            }
            ?>
        </p>
    </div>
</div>