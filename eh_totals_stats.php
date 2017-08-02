<?php
function eh_wordpress_totals_stats() {
if ( get_option('eh_wordpress_totals_active') ) : ?>
<?php 
	echo '<div class="wrap">';
echo '<div id="icon-themes" class="icon32"><br /></div><h2>'; ?>
<?php bloginfo('name'); ?>
<?php echo ' Stats</h2>';
		echo '<p>';
  echo '<table class="widefat">
    <thead>
      <tr>
        <th>'; ?>
<?php bloginfo('description'); ?>
<?php echo '
		</th>
		<th><span style="float:right"><small>WP '; ?>
<?php bloginfo('version'); ?>
<?php echo '</small></span></th>
      </tr>
    </thead>
<tr class="alternate">
<td>Total Users:</td>
<td>
'; ?>
<?php eh_wordpress_totals_users(); ?>
<?php echo '
</td>
</tr>
<tr class="alternate">
<td>Total Posts:</td>
<td>'; ?>
<?php eh_wordpress_totals_posts(); ?>
<?php echo '</td>
</tr>
<tr class="alternate">
<td>Total Comments:</td>
<td>'; ?>
<?php eh_wordpress_totals_comments($show); ?>
<?php echo "</td>
</tr>
<tr class='alternate'>
			<td colspan='2'>
			<span class='button' style='float:left'><a href='http://erichamby.com' target='_blank'>Eric Hamby</a></span>
			<span class='button' style='float:right'><a href='https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=CT2CD6BRPN8KN' target='_blank'>Donations</a></span>
			</td>
		</tr>
</table>";
echo '</p>';
echo '</div>'; ?>
<?php else: ?>
<?php echo '<div class="wrap">';
echo '<div id="icon-themes" class="icon32"><br /></div><h2>'; ?>
<?php bloginfo('name'); ?>
<?php echo ' Stats</h2>';
		echo '<p>';
  echo '<table class="widefat">'; ?>

<div style="padding:5px; color:#fff; border:2px #F00 dotted; background:#900; font-weight:bold; margin-bottom:5px;">Please activate the plugin before using this option.</div>
<?php echo "</td>
<tr class='alternate'>
			<td colspan='2'>
			<span class='button' style='float:left'><a href='http://erichamby.com' target='_blank'>Eric Hamby</a></span>
			<span class='button' style='float:right'><a href='https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=CT2CD6BRPN8KN' target='_blank'>Donations</a></span>
			</td>
		</tr>
</table>";
echo '</p>';
echo '</div>'; ?>
<?php endif; 
} ?>
