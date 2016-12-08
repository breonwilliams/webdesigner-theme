<?php
/**
 * Custom template tags for this theme
 *
 * @package bootstrap-basic
 */


if (!function_exists('bootstrapBasicCategoriesList')) {
	/**
	 * Display categories list with bootstrap icon
	 *
	 * @param string $categories_list list of categories.
	 * @return string
	 */
	function bootstrapBasicCategoriesList($categories_list = '')
	{
		return sprintf('<span class="categories-icon glyphicon glyphicon-th-list" title="' . __('Posted in', 'bootstrap-basic') . '"></span> %1$s', $categories_list);
	}// bootstrapBasicCategoriesList
}


if (!function_exists('bootstrapBasicComment')) {
	/**
	 * Displaying a comment
	 *
	 * @param object $comment
	 * @param array $args
	 * @param integer $depth
	 * @return string the content already echo.
	 */
	function bootstrapBasicComment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;

		if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type) {
			echo '<li id="comment-';
			comment_ID();
			echo '" ';
			comment_class('comment-type-pt');
			echo '>';
			echo '<div class="comment-body media">';
			echo '<div class="media-body">';
			_e('Pingback:', 'bootstrap-basic');
			comment_author_link();
			edit_comment_link(__('Edit', 'bootstrap-basic'), '<span class="edit-link">', '</span>');
			echo '</div>';
			echo '</div>';
		} else {
			echo '<li id="comment-';
			comment_ID();
			echo '" ';
			comment_class(empty($args['has_children']) ? '' : 'parent media');
			echo '>';

			echo '<article id="div-comment-';
			comment_ID();
			echo '" class="comment-body media">';

			// footer
			echo '<footer class="comment-meta pull-left">';
			if (0 != $args['avatar_size']) {
				echo get_avatar($comment, $args['avatar_size']);
			}
			echo '</footer><!-- .comment-meta -->';
			// end footer

			// comment content
			echo '<div class="comment-content media-body">';
			echo '<div class="comment-author vcard">';
			echo '<div class="comment-metadata">';

			// date-time
			echo '<a href="';
			echo esc_url(get_comment_link($comment->comment_ID));
			echo '">';
			echo '<time datetime="';
			comment_time('c');
			echo '">';
			printf(_x('%1$s at %2$s', '1: date, 2: time', 'bootstrap-basic'), get_comment_date(), get_comment_time());
			echo '</time>';
			echo '</a>';
			// end date-time

			echo ' ';

			edit_comment_link('<span class="fa fa-pencil-square-o "></span>' . __('Edit', 'bootstrap-basic'), '<span class="edit-link">', '</span>');

			echo '</div><!-- .comment-metadata -->';

			// if comment was not approved
			if ('0' == $comment->comment_approved) {
				echo '<div class="comment-awaiting-moderation text-warning"> <span class="glyphicon glyphicon-info-sign"></span> ';
				_e('Your comment is awaiting moderation.', 'bootstrap-basic');
				echo '</div>';
			} //endif;

			// comment author says
			printf(__('%s <span class="says">says:</span>', 'bootstrap-basic'), sprintf('<cite class="fn">%s</cite>', get_comment_author_link()));
			echo '</div><!-- .comment-author -->';

			// comment content body
			comment_text();
			// end comment content body

			// reply link
			comment_reply_link(array_merge($args, array(
				'add_below' => 'div-comment',
				'depth'     => $depth,
				'max_depth' => $args['max_depth'],
				'reply_text' => '<span class="fa fa-reply"></span> ' . __('Reply', 'bootstrap-basic'),
				'login_text' => '<span class="fa fa-reply"></span> ' . __('Log in to Reply', 'bootstrap-basic')
			)));
			// end reply link
			echo '</div><!-- .comment-content -->';
			// end comment content



			echo '</article><!-- .comment-body -->';
		} //endif;
	}// bootstrapBasicComment
}


if (!function_exists('bootstrapBasicCommentsPopupLink')) {
	/**
	 * Custom comment popup link
	 *
	 * @return string
	 */
	function bootstrapBasicCommentsPopupLink()
	{
		$comment_icon = '<span class="comment-icon glyphicon glyphicon-comment"><small class="comment-total">%d</small></span>';
		$comments_icon = '<span class="comment-icon glyphicon glyphicon-comment"><small class="comment-total">%s</small></span>';
		return comments_popup_link(sprintf($comment_icon, ''), sprintf($comment_icon, '1'), sprintf($comments_icon, '%'), 'btn btn-default btn-xs');
	}// bootstrapBasicCommentsPopupLink
}


if (!function_exists('bootstrapBasicEditPostLink')) {
	/**
	 * Display edit post link
	 *
	 * @return string
	 */
	function bootstrapBasicEditPostLink()
	{
		return edit_post_link('<b class="edit-post-icon glyphicon glyphicon-pencil" title="' . __('Edit', 'bootstrap-basic') . '"></b>', '<span class="edit-post-icon btn btn-default btn-xs" title="' . __('Edit', 'bootstrap-basic') . '">', '</span>');
	}// bootstrapBasicEditPostLink
}


if (!function_exists('bootstrapBasicFullPageSearchForm')) {
	/**
	 * Display full page search form
	 *
	 * @return string the search form element
	 */
	function bootstrapBasicFullPageSearchForm()
	{
		$output = '<form class="form-horizontal" method="get" action="' . esc_url(home_url('/')) . '" role="form">';
		$output .= '<div class="form-group">';
		$output .= '<div class="col-xs-10">';
		$output .= '<input type="text" name="s" value="' . esc_attr(get_search_query()) . '" placeholder="' . esc_attr_x('Search &hellip;', 'placeholder', 'bootstrap-basic') . '" title="' . esc_attr_x('Search &hellip;', 'label', 'bootstrap-basic') . '" class="form-control" />';
		$output .= '</div>';
		$output .= '<div class="col-xs-2">';
		$output .= '<button type="submit" class="btn btn-default">' . __('Search', 'bootstrap-basic') . '</button>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</form>';

		return $output;
	}// bootstrapBasicFullPageSearchForm
}


if (!function_exists('bootstrapBasicGetLinkInContent')) {
	/**
	 * get the link in content
	 *
	 * @return string
	 */
	function bootstrapBasicGetLinkInContent()
	{
		$content = get_the_content();
		$has_url = get_url_in_content($content);

		if ($has_url) {
			return $has_url;
		} else {
			return apply_filters('the_permalink', get_permalink());
		}
	}// bootstrapBasicGetLinkInContent
}


if (!function_exists('bootstrapBasicMoreLinkText')) {
	/**
	 * Custom more link (continue reading) text
	 * @return string
	 */
	function bootstrapBasicMoreLinkText()
	{
		return __('Continue reading <span class="meta-nav">&rarr;</span>', 'bootstrap-basic');
	}// bootstrapBasicMoreLinkText
}


if (!function_exists('bootstrapBasicPagination')) {
	/**
	 * display pagination (1 2 3 ...) instead of previous, next of wordpress style.
	 *
	 * @param string $pagination_align_class
	 * @return string the content already echo
	 */
	function bootstrapBasicPagination($pagination_align_class = '')
	{
		global $wp_query;
		$big = 999999999;
		$pagination_array = paginate_links(array(
			'base' => str_replace($big, '%#%', get_pagenum_link($big)),
			'format' => '/page/%#%',
			'current' => max(1, get_query_var('paged')),
			'total' => $wp_query->max_num_pages,
			'prev_text' => '&laquo;',
			'next_text' => '&raquo;',
			'type' => 'array'
		));

		unset($big);

		if (is_array($pagination_array) && !empty($pagination_array)) {
			echo '<nav class="' . $pagination_align_class . '">';
			echo '<ul class="pagination">';
			foreach ($pagination_array as $page) {
				echo '<li';
				if (strpos($page, '<a') === false && strpos($page, '&hellip;') === false) {
					echo ' class="active"';
				}
				echo '>';
				if (strpos($page, '<a') === false && strpos($page, '&hellip;') === false) {
					echo '<span>' . $page . '</span>';
				} else {
					echo $page;
				}
				echo '</li>';
			}
			echo '</ul>';
			echo '</nav>';
		}

		unset($page, $pagination_array);
	}// bootstrapBasicPagination
}


if (!function_exists('bootstrapBasicPostOn')) {
	/**
	 * display post date/time and author
	 *
	 * @return string
	 */
	function bootstrapBasicPostOn()
	{
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		if (get_the_time('U') !== get_the_modified_time('U')) {
			$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf($time_string,
			esc_attr(get_the_date('c')),
			esc_html(get_the_date()),
			esc_attr(get_the_modified_date('c')),
			esc_html(get_the_modified_date())
		);

		printf(__('<span class="posted-on">Posted on %1$s</span><span class="byline"> by %2$s</span>', 'bootstrap-basic'),
			sprintf('<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
				esc_url(get_permalink()),
				esc_attr(get_the_time()),
				$time_string
			),
			sprintf('<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
				esc_url(get_author_posts_url(get_the_author_meta('ID'))),
				esc_attr(sprintf(__('View all posts by %s', 'bootstrap-basic'), get_the_author())),
				esc_html(get_the_author())
			)
		);
	}// bootstrapBasicPostOn
}


if (!function_exists('bootstrapBasicTagsList')) {
	/**
	 * display tags list
	 *
	 * @param string $tags_list
	 * @return string
	 */
	function bootstrapBasicTagsList($tags_list = '')
	{
		return sprintf('<span class="tags-icon glyphicon glyphicon-tags" title="' . __('Tagged', 'bootstrap-basic') . '"></span>&nbsp; %1$s', $tags_list);
	}// bootstrapBasicTagsList
}


if (!function_exists('bootstrapBasicTheAttachedImage')) {
	/**
	 * Display attach image with link.
	 *
	 * @return string image element with link.
	 */
	function bootstrapBasicTheAttachedImage()
	{
		$post                = get_post();
		$attachment_size     = apply_filters('bootstrap_basic_attachment_size', array(1140, 1140));
		$next_attachment_url = wp_get_attachment_url();

		/**
		 * Grab the IDs of all the image attachments in a gallery so we can get the
		 * URL of the next adjacent image in a gallery, or the first image (if
		 * we're looking at the last image in a gallery), or, in a gallery of one,
		 * just the link to that image file.
		 */
		$attachment_ids = get_posts(array(
			'post_parent'    => $post->post_parent,
			'fields'         => 'ids',
			'numberposts'    => -1,
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => 'ASC',
			'orderby'        => 'menu_order ID'
		));

		// If there is more than 1 attachment in a gallery...
		if (count($attachment_ids) > 1) {
			foreach ($attachment_ids as $attachment_id) {
				if ($attachment_id == $post->ID) {
					$next_id = current($attachment_ids);
					break;
				}
			}


			if ($next_id) {
				// get the URL of the next image attachment...
				$next_attachment_url = get_attachment_link($next_id);
			} else {
				// or get the URL of the first image attachment.
				$next_attachment_url = get_attachment_link(array_shift($attachment_ids));
			}
		}

		printf('<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
			esc_url($next_attachment_url),
			the_title_attribute(array('echo' => false)),
			wp_get_attachment_image($post->ID, $attachment_size, false, array('class' => 'img-responsive aligncenter'))
		);
	}// bootstrapBasicTheAttachedImage
}

// Breadcrumbs

function the_breadcrumb() {

	/* === OPTIONS === */
	$text['home']     = 'Home'; // text for the 'Home' link
	$text['category'] = 'Archive by Category "%s"'; // text for a category page
	$text['search']   = 'Search Results for "%s" Query'; // text for a search results page
	$text['tag']      = 'Posts Tagged "%s"'; // text for a tag page
	$text['author']   = 'Articles Posted by %s'; // text for an author page
	$text['404']      = 'Error 404'; // text for the 404 page

	$show_current   = 1; // 1 - show current post/page/category title in breadcrumbs, 0 - don't show
	$show_on_home   = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
	$show_title     = 1; // 1 - show the title for the links, 0 - don't show
	$delimiter      = ' / '; // delimiter between crumbs
	$before         = '<span class="current">'; // tag before the current crumb
	$after          = '</span>'; // tag after the current crumb
	/* === END OF OPTIONS === */

	global $post;
	$home_link    = home_url('/');
	$link_before  = '<span typeof="v:Breadcrumb">';
	$link_after   = '</span>';
	$link_attr    = ' rel="v:url" property="v:title"';
	$link         = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
	$parent_id    = $parent_id_2 = $post->post_parent;
	$frontpage_id = get_option('page_on_front');

	if (is_home() || is_front_page()) {

		if ($show_on_home == 1) echo '<section class="section-grey"><div class="container"><div class="breadcrumb"><a href="' . $home_link . '">' . $text['home'] . '</a></div></section>';

	} else {

		echo '<section class="section-grey"><div class="container"><div class="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#">';
		if ($show_home_link == 1) {
			echo '<a href="' . $home_link . '" rel="v:url" property="v:title">' . $text['home'] . '</a>';
			if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo $delimiter;
		}

		if ( is_category() ) {
			$this_cat = get_category(get_query_var('cat'), false);
			if ($this_cat->parent != 0) {
				$cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
				if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo $cats;
			}
			if ($show_current == 1) echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;

		} elseif ( is_search() ) {
			echo $before . sprintf($text['search'], get_search_query()) . $after;

		} elseif ( is_day() ) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
			echo $before . get_the_time('d') . $after;

		} elseif ( is_month() ) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo $before . get_the_time('F') . $after;

		} elseif ( is_year() ) {
			echo $before . get_the_time('Y') . $after;

		} elseif ( is_single() && !is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
				if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $delimiter);
				if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo $cats;
				if ($show_current == 1) echo $before . get_the_title() . $after;
			}

		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;

		} elseif ( is_attachment() ) {
			$parent = get_post($parent_id);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
			$cats = str_replace('</a>', '</a>' . $link_after, $cats);
			if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
			echo $cats;
			printf($link, get_permalink($parent), $parent->post_title);
			if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;

		} elseif ( is_page() && !$parent_id ) {
			if ($show_current == 1) echo $before . get_the_title() . $after;

		} elseif ( is_page() && $parent_id ) {
			if ($parent_id != $frontpage_id) {
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					if ($parent_id != $frontpage_id) {
						$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
					}
					$parent_id = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo $breadcrumbs[$i];
					if ($i != count($breadcrumbs)-1) echo $delimiter;
				}
			}
			if ($show_current == 1) {
				if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo $delimiter;
				echo $before . get_the_title() . $after;
			}

		} elseif ( is_tag() ) {
			echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

		} elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata($author);
			echo $before . sprintf($text['author'], $userdata->display_name) . $after;

		} elseif ( is_404() ) {
			echo $before . $text['404'] . $after;
		}

		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
			echo __('Page') . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}

		echo '</div></section><!-- .breadcrumbs -->';

	}
}