<?php 
function eh_wordpress_totals_dashboard_function() {
	  echo '<table class="widefat">
<tr class="alternate">
<td><strong>Total Users:</strong></td>
<td>
'; ?>
		<?php eh_wordpress_totals_users(); ?>
        <?php echo '
</td>
</tr>
<tr class="alternate">
<td><strong>Total Posts:</strong></td>
<td>'; ?>
		<?php eh_wordpress_totals_posts(); ?>
        <?php echo '</td>
</tr>
<tr class="alternate">
<td><strong>Total Comments:</strong></td>
<td>'; ?>
		<?php eh_wordpress_totals_comments($show); ?>
        <?php echo '</td>
</tr>
<tr class="alternate">
			<td colspan="2">
			<span class="button" style="float:left"><a href="http://erichamby.com" target="_blank">Eric Hamby</a></span>
			<span class="button" style="float:right"><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=CT2CD6BRPN8KN" target="_blank">Donations</a></span>
			</td>
		</tr>

</table>';
} 

function eh_wordpress_totals_widgets() {
	wp_add_dashboard_widget('eh_wordpress_totals', '(EH) Wordpress Totals', 'eh_wordpress_totals_dashboard_function');	
} 
add_action('wp_dashboard_setup', 'eh_wordpress_totals_widgets' ); ?>