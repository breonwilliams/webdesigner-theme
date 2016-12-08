<?php
/**
 * Template for displaying pages
 * 
 * @package bootstrap-basic
 */

get_header();

/**
 * determine main column size from actived sidebar
 */
?>
<?php get_sidebar('woocommerce'); ?>
	<div class="col-md-9 content-area" id="main-column">
		<main id="main" class="site-main" role="main">
			<?php woocommerce_content(); ?>
		</main>
	</div>
<?php get_footer(); ?>