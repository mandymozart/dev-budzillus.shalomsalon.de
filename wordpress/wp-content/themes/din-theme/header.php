<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package din-theme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<style type="text/css">
    /* Fonts preloading before anything */
    @import "<?php echo get_stylesheet_directory_uri(); ?>/fonts/macro-print/MyFontsWebfontsKit.css";
    @import "<?php echo get_stylesheet_directory_uri(); ?>/fonts/mathlete_bulky_macroman/stylesheet.css";
    @import "<?php echo get_stylesheet_directory_uri(); ?>/fonts/mathlete_skinny_macroman/stylesheet.css";
    @import "<?php echo get_stylesheet_directory_uri(); ?>/fonts/font-awesome/css/font-awesome.min.css";
</style>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_stylesheet_directory_uri(); ?>/images/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/images/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri(); ?>/images/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

<?php wp_head(); ?>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

</head>

<body <?php body_class(); ?>>

    <? /* Navbar uncommented
    <div class="navbar navbar-fixed-top" role="navigation">
        <div class="container-fluid">

            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
            </div>

            <div class="navbar-ui">                
                <ul class="nav navbar-nav navbar-right">
                    <?php

                    require_once('helpers/wp-bootstrap-navwalker.php');

                    $defaults = array(
                        'theme_location'  => 'quick-menu',
                        'menu'            => '',
                        'container'       => false,
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => 'menu',
                        'menu_id'         => '',
                        'echo'            => true,
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '%3$s',
                        'depth'           => 0,
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker()
                    );

                    wp_nav_menu( $defaults );

                    ?>
                    </li>
                </ul>
            </div>

        </div>
    </div>
    */ ?>

    <!-- Socials -->
    <div id="socials">
        <ul>
            <li class="nav-icon "><a href="http://www.facebook.com/budzillus"><span class="social social-facebook"></span></a></li>
            <li class="nav-icon "><a href="http://budzillusblog.tumblr.com/"><span class="social social-tumblr"></span></a></li>
            <li class="nav-icon "><a href="http://youtube.com/budzillus"><span class="social social-youtube"></span></a></li>
            <li class="nav-icon "><a href="https://instagram.com/budzillus_official/"><span class="social social-instagram"></span></a></li>                         </span></a></li>
            <li class="nav-icon "><a href="http://soundcloud.com/budzillus"><span class="social social-soundcloud"></span></a></li>
        </ul>
    </div>

    <div class="page" id="fullpage">


