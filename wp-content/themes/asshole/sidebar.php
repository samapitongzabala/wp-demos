<aside id="sidebar">
			<section id="categories" class="widget">
				<h3 class="widget-title"> Categories </h3>
				<ul>
					<?php
					//show up to 15 poular categories
						wp_list_categories( array(
							'title_li' 		=>'',
							'depth' 		=> 1,
							'show_count'	=> 1,
							'orderby'		=> 'count',
							'order'			=>'DESC',
							'number'		=> 15,

						) );
					?>
				</ul>
			</section>
			<section id="archives" class="widget">
				<h3 class="widget-title"> Archives </h3>
				<ul>
					<?php 
						wp_get_archives( array(
							'type'				=>'yearly',
							'show_post_count'	=> 1,
							'limit'				=>15,
							));
					 ?>
				</ul>
			</section>
			<section id="tags" class="widget">
				<h3 class="widget-title"> Tags </h3>
				<!--<ul>
					 <?php wp_list_categories(array(
						'taxonomy' 		=>'post_tag', //show tags instead of categories
						'title_li' 		=> '',
						'show_count' 	=> 1,
						'orderby'		=>'count',
						'order'			=>'DESC',
						'number'		=> 15

					)) ?> 


					
				</ul>-->

				<?php wp_tag_cloud(array(
						'largest'=>1,
						'smallest'=>1,
						'unit'	=>'em'
					)); ?>
			</section>
			<section id="meta" class="widget">
				<h3 class="widget-title"> Meta </h3>
				<?php if(is_user_logged_in()){ ?>
				<ul>
					<li><a href="<?php echo admin_url(); ?>">Site Admin</a></li>
					<li><?php wp_loginout(home_url()) ?></li>
				</ul>
				<?php }elseif(!is_user_logged_in()) {
					wp_login_form();
				}
				?>
			</section>
		</aside>
		<!-- end #sidebar -->