<?php /* Template Name: Page Password Reset */  ?>
<?php
/**
 * Template for displaying pages
 * 
 * @package bootstrap-basic
 */

get_header('');

/**
 * determine main column size from actived sidebar
 */
$main_column_size = bootstrapBasicGetMainColumnSize();
?>

<div class="content-area" id="main-column">
	<main id="main" class="site-main flex-wrap" role="main">

		<?php global $user_ID, $user_identity; get_currentuserinfo(); if (!$user_ID) { ?>
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

			<form method="post" action="<?php echo site_url('wp-login.php?action=lostpassword', 'login_post') ?>" class="wp-user-form">
					<div class="username">
						<label for="user_login" class="hide"><?php _e('Username or Email'); ?>: </label>
						<p>
							<input class="password-reset" type="text" name="user_login" value="" size="20" id="user_login" tabindex="1001" />
						</p>
					</div>
					<div class="login_fields">
						<?php do_action('login_form', 'resetpass'); ?>
						<input type="submit" name="user-submit" value="<?php _e('Reset my password'); ?>" class="user-submit btn btn-yellow btn-noshadow" tabindex="1002" />
						<?php $reset = $_GET['reset']; if($reset == true) { echo '<p>A message will be sent to your email address.</p>'; } ?>
						<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>?reset=true" />
						<input type="hidden" name="user-cookie" value="1" />
					</div>
			</form>


		<?php } else { // is logged in ?>

			<div class="sidebox">
				<h3>Welcome, <?php echo $user_identity; ?></h3>
				<div class="usericon">
					<?php global $userdata; get_currentuserinfo(); echo get_avatar($userdata->ID, 60); ?>

				</div>
				<div class="userinfo">
					<p>You&rsquo;re logged in as <strong><?php echo $user_identity; ?></strong></p>
					<p>
						<a href="<?php echo wp_logout_url('index.php'); ?>">Log out</a> |
						<?php if (current_user_can('manage_options')) {
							echo '<a href="' . admin_url() . '">' . __('Admin') . '</a>'; } else {
							echo '<a href="' . admin_url() . 'profile.php">' . __('Profile') . '</a>'; } ?>

					</p>
				</div>
			</div>

		<?php } ?>
	</main>
</div>
<?php get_footer(); ?> 