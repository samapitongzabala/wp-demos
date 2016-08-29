<?php

add_action('wp_enqueue_scripts','childrenbitch');
function childrenbitch(){
	wp_enqueue_style('2016',get_template_directory_uri().'/style.css');

	wp_enqueue_style('2016-child',get_stylesheet_uri());
}

add_action('widgets_init','child_widgets');
function child_widgets(){
	register_sidebar(array(
		'name'	=> 'Footah area',
		'id'	=> 'footer_area',
		'before_widget'	=>'<section>',
		'after_widget'	=> '</section>'
		));
}


function twentysixteen_fonts_url(){
	return 'https://fonts.googleapis.com/css?family=Bajoo+Paaji';
}

add_action('after_setup_theme','child_unhook');
function child_unhook(){
	remove_filter('widget_tag_cloud_args','twentysixteen_widget_tag_cloud_args');
}