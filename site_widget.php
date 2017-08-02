<?php 
function widget_eh_wordpress_totals_register() {
	function widget_eh_wordpress_totals($args) {
		global $wpdb;
		extract($args);
		$the_title = get_option('eh_wordpress_totals_title');
		$widget_title = empty($the_title) ? __('Wordpress Totals','calendar') : $the_title;

		$the_members = get_option('eh_wordpress_totals_title_users');
		$users_var = empty($the_members) ? "We have %s members." : $the_members; $count = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->users;");
		$total_users = str_replace("%s", $count, $users_var);

		$the_posts = get_option('eh_wordpress_totals_title_users_posts');
		$posts_var = empty($the_posts) ? "We have %s posts." : $the_posts; $count = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post';");
		$total_posts = str_replace("%s", $count, $posts_var);

		$the_comments = get_option('eh_wordpress_totals_title_users_comments');
		$comments_var = empty($the_comments) ? "We have %s comments." : $the_comments; $count = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments WHERE comment_approved = '1';");
		$total_comments = str_replace("%s", $count, $comments_var);

		echo $before_widget;
		echo $before_title . $widget_title . $after_title;
		echo "<ul>";
		if (get_option('eh_wordpress_totals_title_users')) { echo "<li>" . $total_users . "</li>"; }
		if (get_option('eh_wordpress_totals_title_users_posts')) { echo "<li>" . $total_posts . "</li>"; }
		if (get_option('eh_wordpress_totals_title_users_comments')) { echo "<li>" . $total_comments . "</li>"; }
		echo "</ul>";
		echo $after_widget;
	}

	function widget_eh_wordpress_totals_control() {
		$widget_title = get_option('eh_wordpress_totals_title');
		$total_users = get_option('eh_wordpress_totals_title_users');
		$users_title = is_null($total_users) ? "We have %s members." : $total_users;
		$total_posts = get_option('eh_wordpress_totals_title_users_posts');
		$posts_title = is_null($total_posts) ? "We have %s posts." : $total_posts;
		$total_comments = get_option('eh_wordpress_totals_title_users_comments');
		$comments_title = is_null($total_comments) ? "We have %s comments." : $total_comments;
		if (isset($_POST['eh_wordpress_totals_title'])) {
			update_option('eh_wordpress_totals_title',strip_tags($_POST['eh_wordpress_totals_title']));
		}
		if (isset($_POST['eh_wordpress_totals_title_users'])) {
			update_option('eh_wordpress_totals_title_users',strip_tags($_POST['eh_wordpress_totals_title_users']));
		}
		if (isset($_POST['eh_wordpress_totals_title_users_posts'])) {
			update_option('eh_wordpress_totals_title_users_posts',strip_tags($_POST['eh_wordpress_totals_title_users_posts']));
		}
		if (isset($_POST['eh_wordpress_totals_title_users_comments'])) {
			update_option('eh_wordpress_totals_title_users_comments',strip_tags($_POST['eh_wordpress_totals_title_users_comments']));
		}
?>
    <p>
       <label for="eh_wordpress_totals_title"><?php _e('Title','eh_wordpress_totals'); ?>:<br />
       <input class="widefat" type="text" id="eh_wordpress_totals_title" name="eh_wordpress_totals_title" value="<?php echo $widget_title; ?>"/></label>
    </p>
    <p>
       <label for="eh_wordpress_totals_title_users"><?php _e('Text for Total Members','eh_wordpress_totals'); ?>:<br />
       <input class="widefat" type="text" id="eh_wordpress_totals_title_users" name="eh_wordpress_totals_title_users" value="<?php echo $users_title; ?>"/></label>
	   <i>Example:</i> We have %s members.
    </p>
    <p>
       <label for="eh_wordpress_totals_title_users_posts"><?php _e('Text for Total Posts','eh_wordpress_totals'); ?>:<br />
       <input class="widefat" type="text" id="eh_wordpress_totals_title_users_posts" name="eh_wordpress_totals_title_users_posts" value="<?php echo $posts_title; ?>"/></label>
	   <i>Example:</i> We have %s posts.
    </p>
    <p>
       <label for="eh_wordpress_totals_title_users_comments"><?php _e('Text for Total Comments','eh_wordpress_totals'); ?>:<br />
       <input class="widefat" type="text" id="eh_wordpress_totals_title_users_comments" name="eh_wordpress_totals_title_users_comments" value="<?php echo $comments_title; ?>"/></label>
	   <i>Example:</i> We have %s comments.
    </p>
	<p>
	   You can use %s are the variable for the counter. Make blank if you do not wish to show that particular counter at all.
	</p>
    <?php
	}
	wp_register_sidebar_widget( 'eh_wordpress_totals', __('Wordpress Totals','eh_wordpress_totals'), 'widget_eh_wordpress_totals', array('description' => __('Displays Your Sites Totals','eh_wordpress_totals')) );
	wp_register_widget_control( 'eh_wordpress_totals', __('Wordpress Totals','eh_wordpress_totals'), 'widget_eh_wordpress_totals_control');
}
add_action('init', widget_eh_wordpress_totals_register); ?>