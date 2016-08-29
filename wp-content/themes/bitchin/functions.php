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

function bitchin_comments_number($num,$zer,$one,$many){
	if($num == 0){
		echo $zer;
	}elseif($num == 1){
		echo $one;
	}else{
		echo $num.$many;
	}
}


if ( ! isset( $content_width ) ) $content_width = null;

function bitchin_new_products($amount){
//custom shet
$product_query = new WP_Query(array(
	'post_type'	=> 'product',
	'posts_per_page'	=> $amount,

	));

if($product_query->have_posts()){
	?>
	
	<section class="featured-products">
		<h2>Newest</h2>
		<?php
		while($product_query->have_posts()){
			$product_query->the_post();
		 ?>
			<ul class="productlist">
				<li>
					<a href="<?php the_permalink() ?>">
					<?php the_post_thumbnail('thumbnail'); ?>
						<h3><?php the_title() ?></h3>
						<div><?php 
						echo get_post_meta(get_the_id(),'price',true) ?></div>
					</a>
				</li>
			</ul>
		<?php
		}
		?>
	</section>
<?php
}

wp_reset_postdata();
}

//to alter shit
add_action('pre_get_posts','bitchin_blog_no_cat');
function bitchin_blog_no_cat($q){
	if(is_search()){
		$q->set('category__not_in',array(1));
	}
}

function bitchin_contrast_color($hexcolor){
	$r = hexdec(substr($hexcolor,0,2));
	$g = hexdec(substr($hexcolor,2,2));
	$b = hexdec(substr($hexcolor,4,2));
	$yiq = (($r*299)+($g*587)+($b*114))/1000;
	return ($yiq >= 128) ? 'black' : 'white';
}

//cdn
//
//wp_deregister_script ('jquery')
//register like a regular script
//

/**
 * theme customizers
 * 1. Custom Color
 * 2.  Choose Which side
 * 3. Accent Color
 */

// SETTINGS 1
	add_action('customize_register','bitchin_customizer');
	function bitchin_customizer($wp_customize){
		//register setting
		$wp_customize->add_setting( 
			'bitchin_container_color',
			array(
				'default'	=> '#FFF'
			));

		//add control
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize,
			'bitchin_color_container_ui',
				array(
					'label' 	=> 'Container Color',
					'section'	=> 'colors',
					'settings'	=> 'bitchin_container_color'
					)
			));

		$wp_customize->add_setting('bitchin_link_color',array('default'=> 'crimson'));
		$wp_customize->add_control(new WP_Customize_Color_Control(
				$wp_customize,
				'bitchin_link_color_ui',
				array(
					'label'		=> 'Link shit',
					'section'	=> 'colors',
					'settings'	=> 'bitchin_link_color'
					)
			));

		$wp_customize->add_section('bitchin_other_shit',array(
			'title'	=> 'Design Shiet',
			'priority'	=> 30));

		$wp_customize->add_setting(
			'bitchin_sidebar_position',
			array(
				'default' => 'right'
			));

		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			'bitchin_sidebar_position',
			array(
				'label'	=> 'Sidebar Position',
				'section'	=> 'bitchin_other_shit',
				'settings'	=> 'bitchin_sidebar_position',
				'type'	=> 'radio',
				'choices'	=> array(
					'left'	=>'Left Side',//code friendly to person friendly

					'right'	=>'Right Side',
					)
				)
			));

		$wp_customize->add_setting('bitchin_font',array('default' =>'Baloo Chettan'));

		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			'bitchin_font_ui',
			array(
				'label'	=> 'Heading Shiet',
				'section'	=> 'bitchin_other_shit',
				'settings'	=> 'bitchin_font',
				'type'		=> 'select',
				'choices'	=> array(
					'Baloo Chettan'	=> 'Baloo Chettan',
					'Fjalla One'	=> 'Fjalla',
					'Montserrat'	=> 'Montserrat',
					'Playfair Display'	=> 'Playfair'

					)
				)
			));
			
	}

	//embed
	//
	add_action('wp_enqueue_scripts','bitchin_google_font');
	function bitchin_google_font(){
		$font = str_replace(' ','+',get_theme_mod('bitchin_font'));
		$url = 'http://fonts.googleapis.com/css?family='.$font;
		wp_enqueue_style('googlefont',$url);
	}
	add_action('wp_head','bitchin_custom_css');
	function bitchin_custom_css(){
		?>
		<style>
		#content{
			background-color: <?php echo get_theme_mod('bitchin_container_color'); ?>;
		}

		h1,h2,h3,h4,h5{
			font-family: '<?php echo get_theme_mod('bitchin_font') ?>',Georgia,serif;
		}

		a{
			color: <?php echo get_theme_mod('bitchin_link_color') ?>;
		}

		input[type="submit"],button{
			background: <?php echo get_theme_mod('bitchin_link_color') ?>!important;
			color: <?php echo bitchin_contrast_color(get_theme_mod('bitchin_link_color')) ?>!important;
		}
		@media only screen and (min-width: 600px){
			<?php if(get_theme_mod('bitchin_sidebar_position') == 'left'){
				?>
				#content{
					float: right;
					order:3;
				}

				#sidebar{
					float: left;
					order:2;
				}
				<?php
			}
			?>
		}
		</style>
		<?php
	}

	add_action('widgets_init','the_bitchin_widget');
	function the_bitchin_widget(){
		register_widget('Bitchin_Widget');
	}

	class Bitchin_Widget extends WP_Widget{

		function __construct(){
			$widget_ops = array(
				'class_name' => 'bitchin_widget',
				'description'	=> 'Basic bitch'
				);
			parent:: __construct('bitchin_widget','Bitchin Widget',$widget_ops);//gawa id
		}
		//args is arguments for registered sidebar tapos instance ung current settings
		function widget($args,$instance){
			//extract args from abooove
			extract($args);
			echo $before_widget;

			$title = apply_filters('widget_title',$instance['title']);

			if($title){
				echo $before_title.$title.$after_title;
			}

			//THE GUTS
			bitchin_new_products($instance['num']);

			echo $after_widget;
		}

		function form($instance){
			//setup defaults
			//
			$defaults = array(
				'title'	=> 'IMMA BOSS ASS BITCH',
				'num'	=> 5

				);

			$instance = wp_parse_args( (array) $instance, $defaults );
			?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>">Da Title</label>
				<input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo $instance['title'] ?>">
			</p>
			<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">How Many Fucks To Give</label>
				<input type="number" name="<?php echo $this->get_field_name('num'); ?>" id="<?php echo $this->get_field_id('num'); ?>" value="<?php echo $instance['num'] ?>" class="tiny-text">
			</p>
			<?php
			
		}

		function update($new_instance,$old_instance){//i think she passed it here with different names idk
			//sanitize all dat shiet
			//
			$instance['title'] = wp_filter_nohtml_kses($new_instance['title'] );
			$instance['num'] = wp_filter_nohtml_kses($new_instance['num'] );
			return $instance;
		}

	}