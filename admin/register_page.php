<?php 
function eh_wordpress_totals_admin_init() {
	register_setting('eh_wordpress_totals_options', 'eh_wordpress_totals_active');
	register_setting('eh_wordpress_totals_options', 'site_widget_active');
	register_setting('eh_wordpress_totals_options', 'admin_widget_active');
} 
add_action('admin_init', eh_wordpress_totals_admin_init);
?>