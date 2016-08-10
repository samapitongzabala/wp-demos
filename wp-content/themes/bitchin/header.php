<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<?php  ?>
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/reset.css">
		<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class() ?>>
	<div class="container">
	<!--grabbing paths dont automatically echo-->
		<header role="banner" id="header">
		<?php if(has_header_image()){ ?>
		<img src="<?php header_image() ?>" class="custom-header">
		<?php } ?>

		<?php if(function_exists('the_custom_logo')){
			the_custom_logo();
		} ?>

			<h1 class="site-title"><a href="<?php echo home_url() ?>"><?php bloginfo('name'); ?></a></h1>
			<h2><?php bloginfo('description'); ?></h2>
			<?php wp_nav_menu(array(
						'theme_location' => 'main_menu', 
						'container'		=> 'nav', //duuuh
						'container_class' =>	'menu', //nav class menu
						'menu_class'		=> '', //wala nang class sa ul
						'fallback_cb'		=> ''
					)); ?>
			<!--<nav>
				<ul class="nav">
					<?php wp_list_pages(array(
					'depth' => 1,
					'title_li' => '',
					'exlude' =>'735,999',

					)); ?>
				</ul>
			</nav>-->

			<?php get_search_form(); ?>
		</header>
