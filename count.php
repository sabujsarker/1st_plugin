<?php
/**
 * Plugin Name: demo
 * Description: count youre world
 * Plugin URI: http://count.com
 * Author: sabuj
 * Author URI: http://sabujsarker.com
 * Version: 1.0.0
 * License: GPL2
 * Text Domain: count
 * Domain Path: domain/path
 */

/*
    Copyright (C) Year  sabuj  Email

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
 function footer($text)
 {
 	return '<p>hello man.</p>'.$text;
 }
 add_filter( 'admin_footer_text', 'footer' );

 function menu()
 {
 	global $wp_admin_bar;
 	$coustom = array(
 		'id'=>'menu',
 		'title'=>'demo menu',
 		'parent'=>'top-secondary',
 		'href'=>('http://localhost/wordpress/wp-admin/options-general.php?page=my_plugin')

 		);
 	$wp_admin_bar->add_node($coustom);
 }
 add_action( 'admin_bar_menu', 'menu');

 function short_code()
 {
 	return '<h1>hello</h1>';
 }
 add_shortcode( 'my_shortcode', 'short_code' );

 
function my_admin_theme_style() {
    wp_enqueue_style('my-admin-theme', plugins_url('admin.css', __FILE__));
    wp_enqueue_style( 'my_plagin', "https://fonts.googleapis.com/css?family=Cookie|Dancing+Script|Lato|Pathway+Gothic+One&display=swap" );
}
add_action('admin_enqueue_scripts', 'my_admin_theme_style');
add_action('login_enqueue_scripts', 'my_admin_theme_style');
 
 require_once  ('menu.php');