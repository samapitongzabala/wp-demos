<?php

if(post_password_required()){
	return;
}

$comments_by_type = separate_comments( $comments );

$comment_count = count($comments_by_type['comment']);

$pings_count = count($pings_by_type['comment']);
	?>

	<section>
		<h2><?php bitchin_comments_number( $comment_count,'No comments', '1 Comment', ' Comments'); ?></h2>
		<?php if(comments_open()){ ?>
		<a href="#respond">Leave a shitty note</a>
		<?php } ?>
		<ol>
			<?php wp_list_comments(array(
			'type'=>'comment')
			); ?>
		</ol>
		<div class="comment-pagination">
			

		</div>

		<?php comment_form(); ?>
	</section>
<?php if($pings_count !=0){ ?>
	<section>
		<h2><?php echo $pings_count; ?>Ping</a>
		<ol>
			<?php wp_list_comments(array(
			'type'=>'comment')
			) ?>
		</ol>

		<?php if( get_option('page_comments') AND get_comment_pages_count()>1 ){ ?>
			<div class="comment-pagination">
				<?php previous_comments_link('prev'); ?>
				<?php next_comments_link('nek'); ?>
			</div>
		<?php } ?>

		<?php comment_form(); ?>
	</section>
<?php } ?>