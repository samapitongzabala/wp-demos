<?php get_header(); // include the header ?>
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


		</main>
		<!-- end #content -->

		<?php get_sidebar('page'); ?>

		<?php get_footer(); ?>