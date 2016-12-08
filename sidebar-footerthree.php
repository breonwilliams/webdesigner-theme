<?php if (is_active_sidebar('sidebar-footerthree')) { ?>
				<div class="col-md-3" id="sidebar-footerthree">
					<?php do_action('before_sidebar'); ?> 
					<?php dynamic_sidebar('sidebar-footerthree'); ?>
				</div>
<?php } ?> 