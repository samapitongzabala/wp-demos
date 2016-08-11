<?php 
//WORDPESS AUTOMATICALLY INCLUDES  THIS SHIET EVERYQWHERE
//

add_theme_support('post-thumbnails');

add_theme_support('post-formats',array('quote','image','gallery','audio','video','chat','aside','quote'));

add_image_size( 'banner', 1200, 300, true );

//use force regenerate thumbnail
//

add_theme_support('custom-background') ;


add_theme_support('custom-header', array(
	'width' => 1400,
	'height' =>500,
	'flex-height' => true
	)) ;



add_theme_support('custom-logo', array(
'width'=>200,
'height'=> 80,
'header-text'=>array('site-title','site-description'),
	)) ;
//eeeeeeeeeeeeehhh
add_theme_support('html5',array('search-form','comment-form') );

add_theme_support('title-tag');
add_theme_support('automatic-feed-links');

add_editor_style( );


add_filter('excerpt_length','bitchin_ex_length');
function bitchin_ex_length(){
	if(is_search()){
	return 25;
}else{  
	return 100;
}
}


add_filter('excerpt_more','bitchin_ex_more');
function bitchin_ex_more(){
	return '<a href="'.get_permalink().'" class="button">more</a>';
}

add_action('wp_enqueue_scripts','bitchin_comment_reply');
function bitchin_comment_reply(){
	if(is_single() AND comments_open()){
	wp_enqueue_script('comment-reply');
}
}

/**
 * add menu areas. header n footer
 * put wp_nav_menu to display the shit
 */
add_action('init','bitchin_menu_areas');
function bitchin_menu_areas(){
	register_nav_menus(array(
	'main_menu' =>'Main Navigation',
	'footer_menu' =>'Footer Navigation',
	'social_menu' => 'Social Media Links'
		) );
}


/**
 * helper function: archive pahiante
 * call this fuck wherever there are pagination link
 */
function bitchin_pagination(){
	echo '<div class="pagination">';
			if( is_singular('product')){
				// echo 'More shit';
				// previous_post_link('%link','%title');
				// next_post_link('%link','%title');

				//functions with get first usually dont echo
				$next = get_next_post();
				$prev = get_previous_post();
				?>
				
				<?php if($prev){ ?>
				<a href="<?php echo get_permalink($prev);?>">
				<?php echo get_the_post_thumbnail($prev,'thumbnail') ?>
				<h4><?php echo $prev->post_title; ?></h4></a>
				<?php } ?>

				<?php if($next){ ?>
				<a href="<?php echo get_permalink($next);?>">
				<?php echo get_the_post_thumbnail($next,'thumbnail') ?>
				<h4><?php echo $next->post_title; ?></h4></a>
				<?php } ?>
			<?php
			}elseif(is_singular()){
				previous_post_link();
				next_post_link();
			}else{
				if( function_exists('the_posts_pagination')){
					the_posts_pagination(array(
						'next_text'	=>'Next Shiet',
						'previous_text'	=>'Previous Shiet',
						'mid-size'	=> 4
					));

				}else{
					previous_posts_link('Previous Shiet');
					next_posts_link('Next Shiet');
				}
			}

	echo '</div>';
}
add_action('widgets_init','bitchin_widget_areas');

function bitchin_widget_areas(){
	register_sidebar(array(
			'name' => 'Blog Sidebar',
			'id' => 'blog_sidebar',
			'description' => 'this shit appears next to blog',
			'before_widget' =>'<section class="widget %2$s" id="%1$s">',
			'after_widget' => '</section>',
			'before_title' =>'<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );

	register_sidebar(array(
			'name' => 'Footer Area',
			'id' => 'footer_area',
			'description' => 'this shit appears in the footer',
			'before_widget' =>'<section class="widget %2$s" id="%1$s">',
			'after_widget' => '</section>',
			'before_title' =>'<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );

	register_sidebar(array(
			'name' => 'Page Sidebar',
			'id' => 'page_sidebar',
			'description' => 'this shit appears in the pages shit',
			'before_widget' =>'<section class="widget %2$s" id="%1$s">',
			'after_widget' => '</section>',
			'before_title' =>'<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );

	register_sidebar(array(
			'name' => 'Home Area',
			'id' => 'home_area',
			'description' => 'this shit appears in the home shit',
			'before_widget' =>'<section class="widget %2$s" id="%1$s">',
			'after_widget' => '</section>',
			'before_title' =>'<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
}

add_action('wp_enqueue_scripts','bitchin_scripts');
function bitchin_scripts(){
	//attach jq
	wp_enqueue_script('jquery');
	////attach custom js
	// $js = get_stylesheet_directory_uri('js/main.js',__FILE__);
	//when you do javascript shit remember to use noconflict mode:
	//
	//  jQuery(document).ready(function ($){ 
	//  //normal code 
	//  })
	// wp_enqueue_script();
}
