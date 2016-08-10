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
						wp_link_pages(array(
								'before'=>'<div> Keep reading this shiet: ',
								'after'=>'</div>',
								'next_or_number'=>'next'
							));
						?>
						</p>
					</div>
					<div class="postmeta">
						<span class="author"> Posted by: <?php the_author();?> </span>
						<span class="date"> <?php the_date();?> </span>
						<span class="num-comments"> <?php comments_number();?> </span>
						<span class="categories"> 
							<a href="#" title="View all posts in Updates" >
								<?php the_category();?>
							</a>
						</span>
						<span class="tags"><?php the_tags();?></span>
					</div>
					<!-- end postmeta -->
				</article>
				<?php comments_template(); ?>
		<?php }

		bitchin_pagination();
		?>

		<?php
		 }else{ ?>
			<p> wala</p>
		<?php } ?>	


		</main>
		<!-- end #content -->

		<?php get_sidebar(); ?>

		<?php get_footer(); ?>