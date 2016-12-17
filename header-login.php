<?php
/**
 * The theme header
 *
 * @package bootstrap-basic
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>  <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>     <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>     <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <meta name="viewport" content="width=device-width">

    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <!--wordpress head-->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 8]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->
<?php do_action('before'); ?>

<!-- Push nav start -->
<?php
if ( is_user_logged_in() ) { ?>
    <a href="#cd-nav" id="pload-pop" class="cd-nav-trigger" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Click to view full menu.">Menu
        <span class="cd-nav-icon"></span>

        <svg x="0px" y="0px" width="54px" height="54px" viewBox="0 0 54 54">
            <circle fill="transparent" stroke="#656e79" stroke-width="1" cx="27" cy="27" r="25" stroke-dasharray="157 157" stroke-dashoffset="157"></circle>
        </svg>
    </a>

<?php } else { ?>

    <a href="#cd-nav" class="cd-nav-trigger">Menu
        <span class="cd-nav-icon"></span>

        <svg x="0px" y="0px" width="54px" height="54px" viewBox="0 0 54 54">
            <circle fill="transparent" stroke="#656e79" stroke-width="1" cx="27" cy="27" r="25" stroke-dasharray="157 157" stroke-dashoffset="157"></circle>
        </svg>
    </a>

<?php } ?>


<div id="cd-nav" class="cd-nav">
    <div class="cd-navigation-wrapper">
        <div class="cd-half-block">
            <h2>Navigation</h2>

            <nav>
                <?php wp_nav_menu(array('theme_location' => 'pushMenu', 'container' => false, 'menu_class' => 'cd-primary-nav', 'walker' => new BootstrapBasicMyWalkerNavMenu())); ?>

            </nav>
        </div><!-- .cd-half-block -->

        <div class="cd-half-block">
            <?php get_sidebar('pushmenu'); ?>
        </div> <!-- .cd-half-block -->
    </div> <!-- .cd-navigation-wrapper -->
</div> <!-- .cd-nav -->
<div class="pushNav-content">
    <!-- Push nav end -->

    <?php

    $customhead = get_post_meta( $post->ID, 'meta_box_slider_embed', true );

    if ( $customhead ) {
        ?>
        <header class="mycweb-header fixedNav">
            <div class="container">
                <?php if ( get_theme_mod( 'm1_logo' ) ) : ?>
                    <div class="mycweb-logo pull-left">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="site-logo" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">

                            <img src="<?php echo get_theme_mod( 'm1_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">

                        </a>
                    </div>
                <?php else : ?>

                    <h1 class="site-title-heading">
                        <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                    </h1>

                <?php endif; ?>

                <nav>
                    <?php wp_nav_menu(array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'mycweb-main-nav mycweb-main-nav-left list-inline pull-left', 'walker' => new BootstrapBasicMyWalkerNavMenu())); ?>
                    <!-- cd-main-nav -->

                    <?php
                    if ( is_user_logged_in() ) {
                        echo '<ul id="menu-account" class="mycweb-main-nav mycweb-main-nav-right list-inline pull-right logout-button"><li><a class="btn btn-yellow btn-bordered pull-right btn-sm" href="', wp_logout_url(), '" title="Logout">Logout</a></li></ul>';

                        wp_nav_menu(array('theme_location' => 'secondary', 'container' => false, 'menu_class' => 'mycweb-main-nav mycweb-main-nav-right list-inline pull-right', 'walker' => new BootstrapBasicMyWalkerNavMenu()));

                    } else {
                        wp_nav_menu(array('theme_location' => 'accountMenu', 'container' => false, 'menu_class' => 'mycweb-main-nav mycweb-main-nav-right list-inline pull-right logout-button', 'walker' => new BootstrapBasicMyWalkerNavMenu()));
                    }
                    ?>
                </nav>
                <div class="clearfix"></div>
            </div>
        </header>
        <?php full_above_content_area(); ?>
        <?php
    } else { ?>
        <header class="mycweb-header">
            <div class="container">
                <?php if ( get_theme_mod( 'm1_logo' ) ) : ?>
                    <div class="mycweb-logo pull-left">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="site-logo" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">

                            <img src="<?php echo get_theme_mod( 'm1_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">

                        </a>
                    </div>
                <?php else : ?>

                    <h1 class="site-title-heading">
                        <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                    </h1>

                <?php endif; ?>

                <nav>
                    <?php wp_nav_menu(array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'mycweb-main-nav mycweb-main-nav-left list-inline pull-left', 'walker' => new BootstrapBasicMyWalkerNavMenu())); ?>
                    <!-- cd-main-nav -->

                    <?php
                    if ( is_user_logged_in() ) {
                        echo '<ul id="menu-account" class="mycweb-main-nav mycweb-main-nav-right list-inline pull-right logout-button"><li><a class="btn btn-yellow btn-bordered pull-right btn-sm" href="', wp_logout_url(), '" title="Logout">Logout</a></li></ul>';

                        wp_nav_menu(array('theme_location' => 'secondary', 'container' => false, 'menu_class' => 'mycweb-main-nav mycweb-main-nav-right list-inline pull-right', 'walker' => new BootstrapBasicMyWalkerNavMenu()));

                    } else {
                        wp_nav_menu(array('theme_location' => 'accountMenu', 'container' => false, 'menu_class' => 'mycweb-main-nav mycweb-main-nav-right list-inline pull-right logout-button', 'walker' => new BootstrapBasicMyWalkerNavMenu()));
                    }
                    ?>
                </nav>
                <div class="clearfix"></div>
            </div>
        </header>
    <?php } ?>

    <div class="fluid-wrap">
        <div id="content" class="row-with-vspace site-content">