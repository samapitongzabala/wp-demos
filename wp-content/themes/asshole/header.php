<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title></title>
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/reset.css">
		<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>">
		<?php wp_head(); ?>
	</head>
	<body>
	<!--grabbing paths dont automatically echo-->
		<header role="banner" id="header">
			<h1 class="site-title"><a href="<?php echo home_url() ?>"><?php bloginfo('name'); ?></a></h1>
			<h2><?php bloginfo('description'); ?></h2>
			<nav>
				<ul class="nav">
					<?php wp_list_pages(array(
					'depth' => 1,
					'title_li' => '',
					'exlude' =>'735,999',

					)); ?>
				</ul>
			</nav>

			<?php get_search_form(); ?>
		</header>
