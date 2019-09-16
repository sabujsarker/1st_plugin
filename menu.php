<?php 
function s_menu()
{
	
add_options_page( 'my_setting', 'admin bar setting ', 'manage_options', 'my_plugin','callback' );
}
add_action( 'admin_menu', 's_menu' );

function resister()
{
	register_setting( 'resigter', 'our_frist_option' );
	register_setting( 'resigter', 'admin_bar_hide' );
	register_setting( 'resigter', 'post' );
	register_setting( 'resigter', 'media' );
	register_setting( 'resigter', 'pages' );
	register_setting( 'resigter', 'comment' );
	register_setting( 'resigter', 'apperance' );
	register_setting( 'resigter', 'plugin' );
	register_setting( 'resigter', 'user' );
	register_setting( 'resigter', 'tools' );
}
add_action( 'admin_init', 'resister' );

function callback()
{
	?>
		<div class="admin">
			<form action="options.php" method="post">
		<?php settings_fields( 'resigter' ); ?>
		<h1>show and hide manus</h1>
		<input  type="checkbox" name="our_frist_option" value="yes" <?php checked( get_option( 'our_frist_option'), 'yes' ); 
		?>>
		<label >hide user the menu</label> <br>
		<input type="checkbox" name="admin_bar_hide" value="yes" <?php checked( get_option( 'admin_bar_hide'), 'yes') ?>>
		<label >hide admin menu</label> <br>
		<input type="checkbox" name="post" value="yes" <?php checked( get_option( 'post'), 'yes') ?>>
		<label >hide post menu</label> <br>
		<input type="checkbox" name="media" value="yes" <?php checked( get_option( 'media'), 'yes') ?>>
		<label >hide media menu</label> <br>
		<input type="checkbox" name="pages" value="yes" <?php checked( get_option( 'pages'), 'yes') ?>>
		<label >hide pages menu</label> <br>
		<input type="checkbox" name="comment" value="yes" <?php checked( get_option( 'comment'), 'yes') ?>>
		<label >hide comment menu</label> <br>
		<input type="checkbox" name="apperance" value="yes" <?php checked( get_option( 'apperance'), 'yes') ?>>
		<label >hide apperance menu</label> <br>
		<input type="checkbox" name="plugin" value="yes" <?php checked( get_option( 'plugin'), 'yes') ?>>
		<label >hide plugin menu</label> <br>
		<input type="checkbox" name="user" value="yes" <?php checked( get_option( 'user'), 'yes') ?>>
		<label >hide user menu</label> <br>
		<input type="checkbox" name="tools" value="yes" <?php checked( get_option( 'tools'), 'yes') ?>>
		<label > hide tools menu</label> 
		<?php submit_button('save'); ?>
	</form>
		</div>	
	<?php
}




function remove($value,$id)
{
	if (get_option($value) === "yes") {
		remove_menu_page( $id ); 
	}
}
function remove_menus()
{
	remove('post','edit.php');
	remove('media','upload.php');
	remove('pages','edit.php?post_type=page');
	remove('comments','edit-comments.php');
	remove('apperance','themes.php');
	remove('plugin','plugins.php');
	remove('user','users.php');
	remove('tools','tools.php');

}
add_action( 'admin_menu', 'remove_menus' );  

function hide_admin_bar()
{
	if (get_option('our_frist_option') === "yes") {
		
		add_filter( 'show_admin_bar', '__return_false');
		
	}
	if (get_option( 'admin_bar_hide') === "yes") {
		remove_action('in_admin_header', 'wp_admin_bar_render', 0);
	}
	
}
add_action( 'init', 'hide_admin_bar' );

?>
