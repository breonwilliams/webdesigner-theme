<article id="post-<?php the_ID(); ?>" <?php post_class('post search type-post has-post-thumbnail  entry'); ?>>
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	</header>
	<div class="entry-content">

		<?php the_excerpt(); ?>

	</div>
	<footer class="entry-footer"></footer>
</article>