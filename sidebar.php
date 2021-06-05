<?php
if (!is_active_sidebar('sidebar_main')) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar('sidebar_main'); ?>
</aside>