<?php

/**
 * Plugin Name: Bitchin Announcement Bar
 * Description: Fuck this shit motherfuckaaaaa
 * License: GPLv3
 * Author : eh
 * Version: 1.0
 */

/**
 * HTML output of a shiet
 */
add_action('wp_footer','bitchin_ab_html');
function bitchin_ab_html(){

	$values= get_option('bitchin_bar');
	

	?><!--ini si announcenemmntd bar-->
	<div id="bitchin_announcement">
	<p><?php echo $values['text']; ?></p>
	<a href="<?php $values['url']; ?>">ugh</a>
	</div>

	<!-- byyyeeee-->
	<?php


}

/**
 * cssssssssssssssssssssssssssssss
 */


add_action('wp_enqueue_scripts','bitchin_ab_style');

function bitchin_ab_style(){
	$url = plugins_url('bitchin-announcementbar-style.css',__FILE__);//returns url // directory location of this file 

	wp_enqueue_style('fucker',$url); // tell wordpres that shit exists

	
}


//add this shit in the settings

add_action('admin_menu','bitchin_admin');
//add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function);
function bitchin_admin(){
	add_options_page('Bitchin Announcement Bar Settings','Announcement Bar','manage_options','bitchin-announcementbar','bitchin_admin_worked');
}

function bitchin_admin_worked(){
	include( plugin_dir_path(__FILE__) ).'bitchin-ab-form.php'; //gets directory of plug in and concatenates the forms shitty name
}
//SECURITYYYY
//whitelist group of settings so wordpress allows that shit
//
add_action('admin_init','bitchin_ab_setting');
function bitchin_ab_setting(){
	//option group, option name, sanitize callback
	register_setting('bitchin_ab_group','bitchin_bar','bitchin_ab_cleaner');
}

function bitchin_ab_cleaner($dirty){
// $clean = cleaned $dirty;
// //KSES = strip evil scripts
// 
$clean['text'] = wp_kses($dirty['text']);

$clean['url'] = wp_kses($dirty['url']);

return $clean;
}