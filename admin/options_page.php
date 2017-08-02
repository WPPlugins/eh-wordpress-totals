<?php 
function eh_wordpress_totals_options() {
  echo '<div class="wrap">';
 echo '<div id="icon-options-general" class="icon32"><br /></div><h2>'.get_name_eh_wordpress_totals().' Options</h2>';
  eh_wordpress_totals_table_start('Options', 'eh_wordpress_totals_options');
echo '
<tr class="alternate">
<td>Active Plugin:</td>
<td><input name="eh_wordpress_totals_active" value="true" type="checkbox"'; checked("true", get_option("eh_wordpress_totals_active")); echo ' /></td>
</tr>
<tr class="alternate">
<td>Site Sidebar Widget:</td>
<td><input name="site_widget_active" value="true" type="checkbox"'; checked("true", get_option("site_widget_active")); echo ' /></td>
</tr>
<tr class="alternate">
<td>Admin Dashboard Widget:</td>
<td><input name="admin_widget_active" value="true" type="checkbox"'; checked("true", get_option("admin_widget_active")); echo ' /></td>
</tr>
  ';
  eh_wordpress_totals_table_stop();
  ?>
  <div style=" text-align:center;">
<p>
<script type="text/javascript"><!--
google_ad_client = "pub-9151914729117702";
/* Themes And Plugins 2 */
google_ad_slot = "0382732779";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></p></div>
<?php echo '</div>';
} ?>