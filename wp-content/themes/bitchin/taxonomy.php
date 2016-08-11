<?php get_header(); // include the header ?>
		<main id="content">
		<h2></h2>
		<?php if(have_posts()){?>
			<h2><?php if(is_tax('brand')){
				echo 'Shit by';
				}elseif(is_tax('feature')){
					echo 'Shit that has the';
				}else{
					echo 'Shit that\'s';
					} ?>
				<?php single_term_title() ?></h2>
			<?php  
			while(have_posts()){
				the_post();
			?>
				<article id="<?php the_id(); ?>" <?php post_class(); ?>>
					<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('medium') ?></a>
					<h2>
					<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
					</h2>
						<?php the_terms(get_the_id(),'brand','<h3>','<br>','</h3>'); ?>

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

		<?php get_sidebar('shop'); ?>

		<?php get_footer(); ?>