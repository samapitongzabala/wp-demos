<?php get_header(); // include the header ?>
		<main id="content">
		<?php if(have_posts()){ 
			while(have_posts()){
				the_post();
			?>
				<article id="<?php the_id(); ?>" <?php post_class(); ?>>
					<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('medium') ?></a>
					<h2>
					<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
					</h2>

					<?php the_content(); ?>
					<?php the_terms(get_the_id(),'brand','<h3>','<br>','</h3>'); ?>


					<?php the_terms(get_the_id(),'feature','<h3>The features:</h3><ul><li>','</li><li>','</li></ul>'); ?>


					
					<?php 
					the_meta();
					 ?>
				</article>
		<?php }

		bitchin_pagination(); //shop appropro shit
		?>

		<?php
		 }else{ ?>
			<p> wala</p>
		<?php } ?>	


		</main>
		<!-- end #content -->

		<?php get_sidebar('shop'); ?>

		<?php get_footer(); ?>