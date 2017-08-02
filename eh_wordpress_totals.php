<?php
/*
Plugin Name: (EH) Wordpress Totals
Plugin URI: http://erichamby.com
Description: Shows the total number of users, posts, and comments on your wordpress blog. Comes with a admin dash widget and a site widget. Each can be activated or deactivated and the site widget has complete format options to allow you to format exacly how you need the widget to look. Visit "<a href="http://erichamby.com">EricHamby.Com</a>" to get information on this plugin and many others.
Version: 1.0
Build: 10.03.06
Author: Eric Hamby
Author URI: http://erichamby.com/
*/

/* Sets the locations for the plugin */
$ehwordpresstotalsloc = basename(dirname(__FILE__));
$ehwordpresstotalsdir = get_settings('home').'/wp-content/plugins/'.$ehwordpresstotalsloc;
$ehwordpresstotalsfile = $ehwordpresstotalsdir.'/eh_wordpress_totals.php';
$ehwordpresstotalslogo = $ehwordpresstotalsdir.'/admin/images/admin_logo.png';

/* Gets all the files needed for the plugin to work */
require_once('admin/admin_functions.php');
require_once('admin/info_page.php');
require_once('admin/update_page.php');
require_once('admin/options_page.php');
require_once('admin/register_page.php');
require_once('eh_totals_stats.php');
if ( get_option('eh_wordpress_totals_active') ) :
if ( get_option('site_widget_active') ) : 
require_once('site_widget.php');
endif;
if ( get_option('admin_widget_active') ) : 
require_once('admin_widget.php');
endif; endif;

/* Places right settings links */
function set_plugin_meta01($links) {
$plugin = eh_wordpress_totals;
   $settings_link = sprintf( '<a href="admin.php?page=%s">%s</a>', $plugin, __('Settings') );
   array_unshift( $links, $settings_link );
   return $links; }
add_filter( 'plugin_action_links_' . $plugin, 'set_plugin_meta01' );

/* Places left settings links */
function set_plugin_meta02($links, $file) {
$plugin = plugin_basename(__FILE__);
 // Create Index Junkie link
	if ($file == $plugin) {
	return array_merge( $links,
	array( sprintf( '<a href="http://indexjunkie.com">Index Junkie</a>') ));
	} return $links; }
add_filter( 'plugin_row_meta', 'set_plugin_meta02', 10, 2 );

function set_plugin_meta03($links, $file) {
$plugin = plugin_basename(__FILE__);
 // Create Classipress link
	if ($file == $plugin) {
	return array_merge( $links,
	array( sprintf( '<a href="https://www.e-junkie.com/ecom/gb.php?cl=29717&c=ib&aff=105360" target="ejejcsingle">ClassiPress.</a>') ));
	} return $links; }
add_filter( 'plugin_row_meta', 'set_plugin_meta03', 10, 2 );

/* Main plugin function */
if ( get_option('eh_wordpress_totals_active') ) :
function eh_wordpress_totals_users() {
    global $wpdb;
	echo $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->users;");
}
function eh_wordpress_totals_posts() {
    global $wpdb;
	echo $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post';");
}
function eh_wordpress_totals_comments($show) {
    global $wpdb;
	echo $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments WHERE comment_approved = '1';");
}
endif;
?>