<?php function eh_wordpress_totals_update() {
 echo '<div class="wrap">';
 echo '<div id="icon-index" class="icon32"><br /></div><h2>Update Information</h2>'; 
 if (eh_wordpress_totals_updates() > $_SESSION['eh_wordpress_totals_version']) {
	$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://erichamby.com/wp-updates/wordpress_totals_update.php');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);
	} else { 
	$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://erichamby.com/wp-updates/wordpress_totals_no_update.php');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);
	} 
  	$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://erichamby.com/wp-updates/wordpress_totals_version_history.php');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);
echo '</div>';
}
?>