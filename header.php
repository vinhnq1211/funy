<?php
/**
 * Created by PhpStorm.
 * User: vinhnq
 * Date: 24/12/2015
 * Time: 10:21 CH
 */

/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <!--[if lt IE 9]>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="body-innerwrapper">
    <?php if($theme_options_data['funy_show_top_bar']) {?>
    <section id="vina-top-bar">
        <div class="container">
            <div class="row">
                <div id="top1" class="col-md-6 col-sm-6">

                </div>
                <div id="top2" class="col-md-6 col-sm-6">

                </div>
            </div>
        </div>
    </section>
    <?php }?>
    <header id="vina-header">
        <div class="container">
            <div class="row">
                <div id="vina-logo" class="col-md-3 col-sm-3">
                    <?php
                    $logo = wp_get_attachment_image_src( $theme_options_data['funy_logo'], 'full' );
                    ?>
                    <h1>
                        <a href="<?php bloginfo('url');?>"><img src="<?php echo $logo[0];?>" alt=""></a>
                    </h1>
                </div>
                <div id="vina-menu" class="col-md-9 col-sm-9 tRight">
                    <?php wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_id' => 'menu',
                    )); ?>
                </div>
            </div>
        </div>
    </header>
    <section id="vina-main-body">