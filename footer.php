<?php
/**
 * The template for displaying the footer.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
</main><!-- #main -->
</div><!-- #primary -->
<footer>
    <div class="wrapper1k2">
        <div class="logo"><a href="javascript:;"><img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/logo.png" width="134" height="113" alt=""/></a></div>
        <div class="thongtin">
            <?php
            if (is_active_sidebar('footer-1')) :
                dynamic_sidebar('footer-1');
            endif;
            ?>
        </div>
        <?php echo wp_nav_menu( ['menu' => 3, 'menu_class' => 'navFooter'] ) ?>
        <div class="clearDiv"></div>
    </div>
</footer><!--end footer-->
</div><!--end wrapper-->

<?php wp_footer(); ?>
</body>
</html>
