<?php /* Template Name: Page Login */  ?>
<?php
/**
 * Template for displaying pages
 * 
 * @package bootstrap-basic
 */

get_header('login');

/**
 * determine main column size from actived sidebar
 */
$main_column_size = bootstrapBasicGetMainColumnSize();
?>

<div class="content-area" id="main-column">
	<main id="main" class="site-main flex-wrap" role="main">
		<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>

		<section class="flex-item bg-img text-white fill-height" style="background-image: url('<?php echo $thumb['0'];?>')">
			<div class="overlay-blue pad-40 height-100">
				<div class="container">
					<?php
					while (have_posts()) {
						the_post();

						get_template_part('content', 'notitle');

						echo "\n\n";

						// If comments are open or we have at least one comment, load up the comment template
						if (comments_open() || '0' != get_comments_number()) {
							comments_template();
						}

						echo "\n\n";

					} //endwhile;
					?>
				</div>
			</div>
			</section>
<section class="flex-item pad-40">
	<div class="container">
		<?php $login  = (isset($_GET['login']) ) ? $_GET['login'] : 0; ?>

		<?php global $user_login;

		if(isset($_GET['login']) && $_GET['login'] == 'failed')
		{
			if (is_user_logged_in()) {}
			else { echo '<div class="aa_error"><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Oops!</strong> That email / password combination is not valid.</div>
	            </div>'; }
		}
		if (is_user_logged_in()) { ?>

			<h1 id="fittext3" class="text-blue">Hello <?php echo $user_identity; ?>!</h1>

		<?php } else {
			wp_login_form($args);

			$args = array(
				'echo'           => true,
				'redirect'       => home_url('/wp-admin/'),
				'form_id'        => 'loginform',
				'label_username' => __( 'Username' ),
				'label_password' => __( 'Password' ),
				'label_remember' => __( 'Remember Me' ),
				'label_log_in'   => __( 'Log In' ),
				'id_username'    => 'user_login',
				'id_password'    => 'user_pass',
				'id_remember'    => 'rememberme',
				'id_submit'      => 'wp-submit',
				'remember'       => true,
				'value_username' => NULL,
				'value_remember' => true
			); ?>

			<a href="<?php echo esc_url(home_url('/password-reset')); ?>" title="Lost Password">Lost your password?</a>

			<?php
		}

		?>
		</div>
</section>
	</main>
</div>
<?php get_footer(); ?> 