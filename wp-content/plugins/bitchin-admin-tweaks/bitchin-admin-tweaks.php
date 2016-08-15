<?php 

/*
 Plugin Name: Bitchin Admin Tweaks
 Author: For Class
 Description: uuuuuuuuuuuuuuuuuuugh
 License: GPLv3
 */
add_action('login_enqueue_scripts','bitchin_admin_login');
function bitchin_admin_login(){
	$url = plugins_url('bitchin-style.css',__FILE__);
	wp_enqueue_style('bitchin_style', $url );

}

add_filter('login_headerurl','bitchin_shit');

function bitchin_shit(){
	return home_url();
}

add_filter('login_headertitle','bitchin_fuck');

function bitchin_fuck(){
	return 'Go back to the shit';
}

add_action('admin_bar_menu','bitchin_fuckin_toolbar',999);
function bitchin_fuckin_toolbar($bar){
	$bar->remove_node('wp-logo'); //remove admin bar menu item
	$bar->add_node(array(
		'id' 	=> 'contact',
		'title' => '<span class="ab-icon dashicons dashicons-email-alt"></span>Shit talk and shit',
		'href'	=>'href',
		// 'parent'	=> 'top-secondary'

		));
}

add_action('wp_dashboard_setup','bitchin_dash',9999);
function bitchin_dash(){
	//removed shit// what page/ what section
	remove_meta_box('dashboard_quick_press','dashboard','side');
	remove_meta_box('dashboard_primary','dashboard','side');

	wp_add_dashboard_widget('bitchin_help','Helpful Shit','bitchin_dashwidg');
}

function bitchin_dashwidg(){
	echo '<iframe style="width: 100%; height: 100%; overflow: hidden;" src="https://www.youtube.com/embed/LDZX4ooRsWs" frameborder="0" allowfullscreen></iframe>';
}

remove_action('welcome_panel','wp_welcome_panel');