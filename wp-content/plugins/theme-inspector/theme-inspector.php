<?php 
/*
Plugin Name: Theme Inspector
Plugin URI: https://wordpress.org/plugins/theme-inspector
Description:  displays useful technical information on pages and posts to aid in developing Wordpress themes. Only visible to administrators.  Use In Conjunction with the WP Template Hierarchy Document
Author: Melissa Cabral
Version: 2.2.2
Author URI: http://melissacabral.com/
*/
/**
 * Display Theme Inspector as Toolbar (Admin Bar) Item
 * @since ver 2.0
 */
add_action( 'admin_bar_menu', 'mmc_toolbar_link', 999 );
function mmc_toolbar_link( $wp_admin_bar ) {	
	if (current_user_can('install_themes')) {
		$html = mmc_generate_output();
		$args = array(
			'id'    => 'theme-helper',
			'title' => 'Theme Inspector',
			'parent' => 'top-secondary',		
			'meta'  => array( 
				'class' => 'theme-helper',
				'html' => $html,
				),
			);
		$wp_admin_bar->add_node( $args );
	}
}
/**
 * function to generate output HTML
 * @since 1.0
 */
function mmc_generate_output(){		
	//make sure user is logged in
	if (current_user_can('install_themes')) {
		global $post;
		//begin Table Output
		ob_start();
		?>
		<!-- WordPress Theme Inspector by Melissa Cabral-->
			<div id="theme-helper-toolbar">
			<table>
				<?php if(is_admin()){ ?>
				<tr>					
					<td colspan="2"><a style="text-align:center" href="<?php echo home_url('/'); ?>">View your site to see Theme Inspector in action!</a></td>
				</tr>
				<?php }else{  ?>
				<tr>
					<th>Content Type:</th>
					<td><?php echo adminhelper_content_type()?></td>
				</tr>
				<?php if(is_singular()){ ?>
				<tr>
					<th>Post ID:</th>
					<td><?php echo adminhelper_post_id()?></td>
				</tr>
				<?php }	?>
				<tr>
					<th>True Condition(s):</th>
					<td><?php echo adminhelper_true_conditions()?></td>
				</tr>
				<?php if( !is_404() && ! is_search() &&  get_post_type() ) { ?>
				<tr>
					<th>Post Type:</th>
					<td><?php  echo  get_post_type();  ?></td>
				</tr>
				<?php } ?>
				<?php 
				if( is_category() || is_tax() || is_tag() ){ ?>
				<tr>
					<th>Taxonomy:</th>
					<td><?php 
					echo adminhelper_taxonomy()?>
					</td>
				</tr>
				<?php }		?>			
				<?php
				if (isset($post->ID) && is_page() && get_post_meta($post->ID,'_wp_page_template',true) != 'default') {?>
				<tr>
					<th>Custom Template:</th>
					<td><?php echo get_post_meta($post->ID,'_wp_page_template',true) ?></td>
				</tr>
				<tr>
					<th>Order:</th>
					<td><?php echo $post->menu_order ?></td>
				</tr>		
				<?php 
				}	?>
				<tr class="file-loaded">
					<th>File Loaded:</th>
					<td><?php echo adminhelper_get_current_template() ?></td>
				</tr>
				<?php } //end not admin ?>
				<tr class="credits">
					<td colspan="2">Theme Inspector by <a href="https://wordpress.org/plugins/theme-inspector">Melissa Cabral</a>.</td>
				</tr>
				<tr class="credits usewith">
					<td colspan="2">Use with <a target="_blank" href="https://docs.google.com/drawings/d/1hJ0MpHO3HKBT5KsTpGtc_gDYZ5pi-HyxNcRtmPBBULE">Hierarchy Diagram</a></td>
				</tr>
			</table>
		</div><!-- End Theme Inspector -->
	<?php 	
	return ob_get_clean();			
	} //end is user logged in
}


/**
 * helper functions
 */

function adminhelper_taxonomy(){
	global $post;
	$queried_object = get_queried_object();
	$term_id = $queried_object->term_id;
	$tax_name = $queried_object->taxonomy;
	$term = single_cat_title('', false );
	$output = '';
	$output .= $tax_name .' > ';
	$output .= $term ;					
	$output .= ' (ID: '. $term_id .')'; 
	return $output;
}
function adminhelper_content_type(){
	global $post;
	$output = '';
	if (is_admin()) { $output .= "Admin Panel"; }

	if (is_home()) { $output .= "Home (blog) "; }
	elseif (is_front_page()) { $output .= "Front Page "; }	
	
	if (is_single()) { $output .= "Single Post "; }
	if (is_page() && !is_front_page()) { $output .= "Page "; }
	if (is_category()) { $output .= "Category "; }
	if (is_tag()) { $output .= "Tag "; }
	if (is_tax()) { $output .= "Taxonomy "; }
	if (is_author()) { $output .= "Author "; }		
	if (is_archive()) { $output .= "Archive "; }
	if (is_date()) { $output .= " - Date "; }
	if (is_year()) { $output .= " (year) "; }
	if (is_month()) { $output .= " (monthly) "; }
	if (is_day()) { $output .= " (daily) "; }
	if (is_time()) { $output .= " (time) "; }		
	if (is_search()) { $output .= "Search "; }
	if (is_404()) { $output .= "404 "; }
	if (is_paged()) { $output .= " (Paged) "; }
	return $output;
}
function adminhelper_post_id(){
	global $post;
	if( isset($post) ){
		$post_id = $post->ID;
	}else{
		$post_id = 'no post defined';
	}
	return $post_id;
}
function adminhelper_true_conditions(){
	global $post;
	$conditions = array();	
	$output = '';
	$count = 0;
	if (is_admin()) { $conditions[] = "is_admin()"; }
	if (is_home()) { $conditions[] = "is_home()"; }
	if (is_front_page()) { $conditions[] = "is_front_page()"; }	
	if (is_attachment() ){ $conditions[] = "is_attachment()"; }
	if (is_single()) { $conditions[] = "is_single()"; }
	if (is_page()) { $conditions[] = "is_page()"; }
	if (is_singular()) { $conditions[] = "is_singular() "; }
	if (is_category()) { $conditions[] = "is_category()"; }
	if (is_tag()) { $conditions[] = "is_tag()"; }
	if (is_tax()) { $conditions[] = "is_tax()"; }
	if (is_author()) { $conditions[] = "is_author()"; }
	if (is_post_type_archive()){ $conditions[] = "is_post_type_archive()"; }
	if (is_date()) { $conditions[] = "is_date()"; }
	if (is_year()) { $conditions[] = "is_year()"; }
	if (is_month()) { $conditions[] = " is_month()"; }
	if (is_day()) { $conditions[] = " is_day()"; }
	if (is_time()) { $conditions[] = " is_time()"; }	
	if (is_archive()) { $conditions[] = " is_archive() "; }	
	if (is_search()) { $conditions[] = "is_search() "; }
	if (is_404()) { $conditions[] = "is_404() "; }
	if (is_paged()) { $conditions[] = "is_paged() "; }
	foreach($conditions as $condition){
		if($count == 0)
			$output.= '<span class="first condition">'.$condition.'</span>';
		else
			$output.= '<span class="condition">, '.$condition.'</span>';	
		$count ++;
	}	
	return $output;
}
function adminhelper_get_current_template(  ) {
	if( !isset( $GLOBALS['current_theme_template'] ) ){
		return false;
	}
	return $GLOBALS['current_theme_template'];
}
//Added to Fetch the template file being used
add_filter( 'template_include', 'var_template_include', 1000 );
function var_template_include( $t ){
	$GLOBALS['current_theme_template'] = basename($t);
	return $t;
}

/**
 * Enqueue the stylesheet
 * @since ver 2.0
 */
add_action('wp_enqueue_scripts', 'adminhelper_enqueue_stylesheet');
add_action('admin_enqueue_scripts', 'adminhelper_enqueue_stylesheet');
function adminhelper_enqueue_stylesheet(){
	$src = plugins_url( 'theme-inspector.css', __FILE__ );
	wp_register_style( 'themehelper-style', $src, '', '', 'screen' );
	wp_enqueue_style( 'themehelper-style' );
}
