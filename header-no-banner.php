<?php
/**
 * The template for displaying the header.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body>
<div id="backtotop"></div>
<div id="wrapper">
    <header>
        <div class="wrapper1k2">
            <div class="logo"><?php generate_construct_logo()?></div>
            <a href="javascript:;" class="navBtn"><span></span><span></span><span></span></a>
            <a href="javascript:;" class="searchBtn icon"></a>
            <div class="searchBox">
                <input type="text" placeholder="Nhập nội dung tìm kiếm"/>
                <a href="javascript:;" class="submitBtn">Tìm kiếm</a>
            </div><!--end searchBox-->
        </div><!--end wrapper1k2-->
    </header><!--end header-->

    <nav>
        <?php echo wp_nav_menu( ['menu' => 2, 'container' => false, 'echo'=> false, 'depth' => 0] ) ?>
    </nav>
    <div id="primary" <?php generate_do_element_classes( 'content' ); ?>>
        <main id="main" <?php generate_do_element_classes( 'main' ); ?>>