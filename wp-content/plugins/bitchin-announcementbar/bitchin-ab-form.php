<div class="wrap">
	<h1>Bitchin Announcement Settings</h1>
	<p>Congrats u fuck</p>
	

	
	<form action="options.php" method="post">
	<?php 
		//connect this form to the settings group in the DB 
		//(we registered this group with register_setting() in the plugin )
		settings_fields( 'bitchin_ab_group' ); 
		$values = get_option('bitchin_bar');
		?>
	<label> Text for that bar shit</label>
	<input type="text" name="bitchin_bar[text]" value="<?php echo $values['text']; ?>">

	<br>
	<label> idk what else prolly the link</label>
	<input type="url" name="bitchin_bar[url]" value="<?php echo $values['url']; ?>">

	<?php submit_button('Save dat shit'); ?>

</div>