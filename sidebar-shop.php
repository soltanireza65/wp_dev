<?php

if (!is_active_sidebar('sidebar_shop')) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar('sidebar_shop'); ?>
</aside>