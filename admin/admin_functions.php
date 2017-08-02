<?php
/* Gets plugin information which is used throughout the files */
function get_name_eh_wordpress_totals(){
	global $ehwordpresstotalsloc;
	$theme_data = implode('', file(ABSPATH."/wp-content/plugins/".$ehwordpresstotalsloc."/eh_wordpress_totals.php"));
	if (preg_match("|Plugin Name:(.*)|i", $theme_data, $name_eh_wordpress_totals)) {
		$name_eh_wordpress_totals = $name_eh_wordpress_totals[1];
	}
	return $name_eh_wordpress_totals;
} 
function get_version_eh_wordpress_totals(){
	global $ehwordpresstotalsloc;
	$theme_data = implode('', file(ABSPATH."/wp-content/plugins/".$ehwordpresstotalsloc."/eh_wordpress_totals.php"));
	if (preg_match("|Version:(.*)|i", $theme_data, $version_eh_wordpress_totals)) {
		$version_eh_wordpress_totals = $version_eh_wordpress_totals[1];
	}
	return $version_eh_wordpress_totals;
} 
function get_build_eh_wordpress_totals(){
	global $ehwordpresstotalsloc;
	$theme_data = implode('', file(ABSPATH."/wp-content/plugins/".$ehwordpresstotalsloc."/eh_wordpress_totals.php"));
	if (preg_match("|Build:(.*)|i", $theme_data, $build_eh_wordpress_totals)) {
		$build_eh_wordpress_totals = $build_eh_wordpress_totals[1];
	}
	return $build_eh_wordpress_totals;
} 

/* Starts the plugins admin menu */
add_action('admin_menu', 'eh_wordpress_totals_info_page'); 
function eh_wordpress_totals_info_page(){
 global $ehwordpresstotalslogo;
 add_menu_page('(EH) Wordpress Totals', 'WP Totals', 8, 'eh_wordpress_totals', 'eh_wordpress_totals_info', $ehwordpresstotalslogo);
 $mypage = add_submenu_page('eh_wordpress_totals', 'Options', 'Options', 8, 'eh_wordpress_totals_options', eh_wordpress_totals_options);
 add_submenu_page('eh_wordpress_totals', 'Stats', 'Stats', 8, 'plugin_update_eh_wordpress_stats', eh_wordpress_totals_stats);
 /*add_submenu_page('eh_wordpress_totals', 'Update', 'Update', 8, 'eh_wordpress_totals_update', eh_wordpress_totals_update);*/
 add_submenu_page('eh_wordpress_totals', 'Eric Hamby', 'Eric Hamby', 8, 'erichamby_eh_wordpress_totals', erichamby_eh_wordpress_totals);
 add_action( "admin_print_scripts-$mypage", 'eh_wordpress_totals_admin_head' );
}

/* Gets the JS files used for the plugin */
function eh_wordpress_totals_admin_head() {
	global $ehwordpresstotalsdir;
	wp_enqueue_script('loadjs', $ehwordpresstotalsdir . '/admin/js/jquery.js');
	wp_enqueue_script('loadjsone', $ehwordpresstotalsdir . '/admin/js/jquery.checkbox.min.js');
	wp_enqueue_script('loadjstwo', $ehwordpresstotalsdir . '/admin/js/jsslideone.js');

/* Chooses the CSS sheet based on browser being used */	
	if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) {
	require_once('admin_head_css_ie.php'); } else { require_once('admin_head_css.php');
}}

/* Function for the Eric Hamby page */
function erichamby_eh_wordpress_totals() {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'http://www.erichamby.com/wp-files/backend_erichamby.php');
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_exec($ch);
	curl_close($ch);	
}

/* Function for the updater */
session_start();
$_SESSION['eh_wordpress_totals_version'] = '1.0' ;
function eh_wordpress_totals_updates()
 {
$site_url = 'http://www.erichamby.com/wp-updates/wordpress_totals_update.php';
$ch = curl_init();
$timeout = 5; // set to zero for no timeout
curl_setopt ($ch, CURLOPT_URL, $site_url);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
 
ob_start();
curl_exec($ch);
curl_close($ch);
$file_contents = ob_get_contents();
ob_end_clean();

   if (preg_match ("@\<span\>(.*)\</span\>@i", $file_contents, $out)) {
   return $out[1];
   
  }
 } 
 
 /* Starts the theme options tables */
function eh_wordpress_totals_table_start($name, $field) {
	echo '<p><table class="widefat">
    <thead>
      <tr>
        <th width="300px;">'.$name.'</th>
		<th><span style="float:right"><small>'.get_version_eh_wordpress_totals().'</small></span></th>
      </tr>
    </thead>';
	echo '<form method="post" action="options.php">';
	settings_fields($field);
}

/* Ends the theme options tables */
function eh_wordpress_totals_table_stop() {
	echo '
	<tr class="alternate">
			<td colspan="2">
			<span style="float:left"><input type="submit" class="button" value="Save Options" /></span>
			<span class="button" style="float:right"><a href="http://erichamby.com" target="_blank">Eric Hamby</a></span>
			</td></tr>
			</form>
	</table></p>';
}
/* They who can give up essential liberty to obtain a little temporary safety, deserve neither liberty nor safety. - Benjamin Franklin */
?>