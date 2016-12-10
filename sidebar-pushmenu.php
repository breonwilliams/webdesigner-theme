<?php if (is_active_sidebar('sidebar-pushmenu')) { ?>
        <?php do_action('before_sidebar'); ?>
        <?php dynamic_sidebar('sidebar-pushmenu'); ?>
<?php } ?>