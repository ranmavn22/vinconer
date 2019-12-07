<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header(); ?>
<?php
while (have_posts()) : the_post();
    ?>
    <div class="sanpham">
        <?php
        echo do_shortcode("[list_products post_id='".get_the_ID()."']");
        $currentID = get_the_ID();
        $args = array(
            'posts_per_page' => -1,
            'offset' => 0,
            'post_type' => 'products',
            'post_status' => 'publish',
            'tax_query' => array(
                array(
                    'taxonomy' => 'category_products',
                    'field' => 'slug',
                    'terms' => 'products'
                )
            )
        );
        $posts = get_posts($args);
        ?>
        <div class="productDetails tabContent">
            <?php if($posts){?>
                <?php foreach ($posts as $post){?>
                    <?php $imgs = get_field('images', $post->ID);?>
                    <div class="wrapper1k2 item item<?php echo $post->ID?> <?php echo $post->ID == $currentID ? 'active' : '' ?>">
                        <?php if(!empty($imgs)){?>
                        <div class="left">
                            <div class="anhto">
                                <?php $image = wp_get_attachment_image_src($imgs[0],'medium_thumbnail')?>
                                <img src="<?php echo $image[0]?>" alt="<?php echo $post->post_title ?>"/>
                            </div>
                            <ul>
                                <?php foreach ($imgs as $key => $img){?>
                                    <?php $image = wp_get_attachment_image_src($img,'medium_thumbnail')?>
                                    <li><a href="javascript:;" class="<?php $key == 0 ? 'active' : ''?>"><img src="<?php echo $image[0]?>" alt="<?php echo $post->post_title ?>" width="138" height="92"/></a></li>
                                <?php }?>
                            </ul>
                        </div><!--end left-->
                        <?php }?>

                        <div class="right">
                            <h1><?php echo $post->post_title ?></h1>
                            <div class="lienhe">
                                <p>Quý Khách vui lòng liên hệ với chúng tôi để được tư vấn và phục vụ một cách tốt nhất. <br/>Hotline: 0982 909 199</p>
                                <a href="/lien-he/" class="dathangBtn">Liên hệ đặt hàng</a>
                            </div><!--end lienhe-->
                            <div class="thongtinsp">
                                <ul>
                                    <li><a href="javascript:;" class="active" id="box1Btn">Thông số kỹ thuật</a></li>
                                    <li><a href="javascript:;" id="box2Btn">Mô tả sản phẩm</a></li>
                                    <li><a href="javascript:;" id="box3Btn">Ứng dụng sản phẩm</a></li>
                                </ul>
                                <div class="chitiet" id="box1">
                                    <?php echo get_field('thong_so_ky_thuat', $post->ID);?>
                                </div><!--end chitiet-->
                                <div class="chitiet" id="box2">
                                    <?php echo $post->post_content?>
                                </div><!--end chitiet-->
                                <div class="chitiet" id="box3">
                                    <?php echo get_field('ung_dung_san_pham', $post->ID);?>
                                </div><!--end chitiet-->
                            </div><!--end thongtinsp-->
                        </div><!--end right-->
                        <div class="clearDiv"></div>
                    </div><!--end wrapper1k2-->
        <?php }?>
        <?php }?>
        </div><!--end prDetails-->
        <div class="clearDiv"></div>
    </div><!--end sanpham-->

    <div class="khachhang">
        <div class="bg_rong"></div>
        <div class="bg_rong bg_dac"></div>
        <h2>Khách hàng và công trình tiêu biểu</h2>
        <?php echo do_shortcode("[list_builds]"); ?>
    </div><!--end khachhang-->
<?php
endwhile; ?>
<?php get_footer();
