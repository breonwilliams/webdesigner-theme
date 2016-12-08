<?php if (is_active_sidebar('sidebar-woocommerce')) { ?>
				<div class="col-md-3" id="sidebar-woocommerce">
					<?php do_action('before_sidebar'); ?> 
					<?php dynamic_sidebar('sidebar-woocommerce'); ?>
				</div>
<?php } ?> 