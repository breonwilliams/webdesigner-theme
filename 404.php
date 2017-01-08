<?php get_header(); ?>

<div class="col-md-12 content-area" id="main-column">
	<main id="main" class="site-main" role="main">
		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php _e('Oops! That page can&rsquo;t be found.', 'bootstrap-basic'); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php _e('It looks like nothing was found at this location. Maybe try a search?', 'bootstrap-basic'); ?></p>

				<!--search form-->
				<form role="search" method="get" class="search-form form" action="<?php echo esc_url(home_url('/')); ?>">
					<label for="form-search-input" class="sr-only"><?php _ex('Search for', 'label', 'bootstrap-basic'); ?></label>
					<div class="input-group">
						<input type="search" id="form-search-input" class="form-control" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'bootstrap-basic'); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" title="<?php echo esc_attr_x('Search for:', 'label', 'bootstrap-basic'); ?>">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-default"><?php esc_html_e('Search', 'bootstrap-basic'); ?></button>
		</span>
					</div>
				</form>


			</div><!-- .page-content -->
		</section><!-- .error-404 -->
	</main>
</div>

<?php get_footer(); ?> 