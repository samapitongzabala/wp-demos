<aside id="sidebar">
<?php if(!is_post_type_archive('product')){ ?>
<section>
	<a href="<?php echo get_post_type_archive_link('product'); ?>">Remove filters from this shiet</a>

</section>
<?php } ?>
		<section class="widget">
		<h3>Dis brands</h3>
		<ul>
			<?php wp_list_categories( array(
				'taxonomy' => 'brand',
				'title_li'	=> '',
				'show_count' => true
			)); ?>
		</ul>
		</section>


<section class="widget">
		<h3>Dis feechur</h3>
		<ul>
			<?php wp_list_categories( array(
				'taxonomy' => 'feature',
				'title_li'	=> '',
				'show_count' => true
			)); ?>
		</ul>
		</section>

</aside>