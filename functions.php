<?php

if (!defined('_themename_VERSION')) {
	define('_themename_VERSION', '1.0.0');
}

require_once __DIR__ . '/inc/elementor/init.php';
// require_once __DIR__ . '/inc/search/search.php';
require_once __DIR__ . '/inc/live_search/live_search.php';
require_once __DIR__ . '/inc/blocks/enqueue.php';
require_once get_theme_file_path() . '/inc/theme_options/codestar-framework.php';

require_once get_theme_file_path() . '/inc/theme_options/options/admin-options.php';
// require_once get_theme_file_path() . '/inc/theme_options/options/comment-options.php';
// require_once get_theme_file_path() . '/inc/theme_options/options/customize-options.php';
// require_once get_theme_file_path() . '/inc/theme_options/options/metabox-options.php';
// require_once get_theme_file_path() . '/inc/theme_options/options/nav-menu-options.php';
// require_once get_theme_file_path() . '/inc/theme_options/options/profile-options.php';
// require_once get_theme_file_path() . '/inc/theme_options/options/shortcode-options.php';
// require_once get_theme_file_path() . '/inc/theme_options/options/taxonomy-options.php';
// require_once get_theme_file_path() . '/inc/theme_options/options/widget-options.php';

require get_template_directory() . '/inc/widgets.php';
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/custom-style.php';
require get_template_directory() . '/inc/setup-theme.php';
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/Mobile-Detect/Mobile_Detect.php';
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
	require get_template_directory() . '/inc/woocommerce_functions.php';
}
// add_action('init', '_themename_prevent_wp_login');
function _themename_prevent_wp_login() {
	global $pagenow;
	$action = (isset($_GET['action'])) ? $_GET['action'] : '';
	if ($pagenow == 'wp-login.php' && (!$action || ($action && !in_array($action, array('logout', 'lostpassword', 'rp', 'resetpass'))))) {
		$page = get_bloginfo('url');
		wp_redirect($page);
		exit();
	}
}
