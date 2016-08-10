<?php get_header(); // include the header ?>
		<main id="content">
		<?php if(have_posts()){?>
			<h2><?php post_type_archive_title() ?></h2>
			<?php  
			while(have_posts()){
				the_post();
			?>
				<article id="<?php the_id(); ?>" <?php post_class(); ?>>
					<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('medium') ?></a>
					<h2>
					<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
					</h2>
					<?php the_excerpt(); ?>
					
					<?php 
					$price = get_post_meta( get_the_id(), 'price', true);
					if($price){
					 ?>
					<div class="price">
						<?php echo $price;//get shits meta ?>

					</div>
					<?php }else{ ?>

					<div class="price">
					fries before price
					</div>
					<?php } ?>
				</article>
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