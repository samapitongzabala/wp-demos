<?php get_header(); // include the header ?>
		<main id="content">
		<?php if(have_posts()){ 
			while(have_posts()){
				the_post();
			
			if(function_exists('rad_slider')){
				rad_slider();

			}else{
				the_post_thumbnail('banner');
			}


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
							the_post_thumbnail('banner');
							the_content();
						?>
						</p>
					</div>
					<!-- end postmeta -->
				</article>

				<?php 
				$id = get_option('page_on_front');//front page is a weird fuck and it's id is ethereal
				$about = get_post_meta($id, 'fuck', true );

				if($about){ ?>
				<div>
				<?php echo $about ?>
				</div>
				<?php } ?>
		<?php }
		 }else{ ?>
			<p> wala</p>
		<?php } ?>	

		<?php 
		bitchin_new_products(5);
		 ?>
		
		<?php get_template_part('section','homewidgets'); ?>

		</main>
		<!-- end #content -->


		<?php get_footer(); ?>