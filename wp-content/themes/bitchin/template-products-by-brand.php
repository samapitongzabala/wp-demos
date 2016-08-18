<?php

/*
Template Name: Products Sorted by Brand

 */

get_header(); // include the header ?>
		<main id="content">
		<?php if(have_posts()){ 
			while(have_posts()){
				the_post();
			?>
				<article id="<?php the_id(); ?>" <?php post_class(); ?>>
					<h2 class="entry-title"> 
						<a href="<?php the_permalink(); ?>"> 
							<?php the_title(); ?>
						</a>
					</h2>
					<div class="entry-content">
						<p>
						<?php 
							the_post_thumbnail('large');
							the_content();
						?>
						</p>
					</div>
					<!-- end postmeta -->
				</article>
				<?php comments_template(); ?>
		<?php }
		 }else{ ?>
			<p> wala</p>
		<?php } ?>	

		<?php 
		// get terms and shit
		// 
		$terms = get_terms('brand');

		foreach($terms as $term){
		?>

			<h2><?php echo $term->name; ?> (<?php echo $term->count; ?>)</h2>

			<?php 
			$custom_query = new WP_Query( array(
				'post_type'	=> 'product',
				'posts_per_page'	=>3,
				'taxonomy'		=> 'brand',
				'term'			=>$term->slug,
				));

			 if($custom_query->have_posts()){

			 	while($custom_query->have_posts()){
			 				 		
				 	$custom_query->the_post();
				 	?>
		 			<ul>
		 				<li>
		 					<a href="<?php the_permalink() ?>">
		 					<?php the_post_thumbnail('thumbnail' ); ?>
		 					<h3><?php the_title(); ?></h3>
		 					</a>
		 				</li>
		 			</ul>
		 			<?php
 		 		}
	 		}

		}
		 ?>

		</main>
		<!-- end #content -->

		<?php get_sidebar('page'); ?>

		<?php get_footer(); ?>