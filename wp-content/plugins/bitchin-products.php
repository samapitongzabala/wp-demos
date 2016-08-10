<?php 

/*
*Plugin Name: Bitchin Products
* Description: Adfds products to thst shiet
* License: GPLv3
* Version: 0.1
* Author: Me the fuck
* Plugin URI:
* Author URI: http://samzabala.com
 */

add_action('init','bitchin_products_cpt');
function bitchin_products_cpt(){
	//keep shit singular fucker
	register_post_type('product',array(
		'public' 		=> true,
		'has_archive'	=> true,
		'label' 		=> 'Products',//para sa admin hindi 'post' ang ngaran
		'menu_icon'		=> 'dashicons-cart', //icon sa admin
		'menu_position'	=> 5, // hierarchy sa may nav
		'supports'		=> array('title','editor','excerpt','thumbnail','custom-fields','revisions'),
		'rewrite'		=> array('slug' =>'shop'),//redirect the name of the slug in the url
		'labels' 		=>array(
			'name' 			=> 'Products',
			'singular_name' => 'Porduct',
			'add_new_item' 	=> 'Add New fucking prODUCTSSS',
			'not_found'		=> 'No shet found'
			)
		));	
}