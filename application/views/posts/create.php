<?php echo form_open('posts/create'); ?>
<fieldset>
	<legend>Create Post</legend>
	
	<?php echo display_errors($errors); ?>
	
	<p>
		<label for="post_title">Title</label><br/>
		<input type="text" name="title" id="post_title" value="<?php echo set_value('title'); ?>" />
	</p>
	<p>
		<label for="post_content">Content</label><br/>
		<textarea name="content" id="post_content"><?php echo set_value('content')?></textarea>
	</p>
	<p>
		<label>
			<input type="hidden" name="status" value="1" />
			<input type="checkbox" name="status" value="2" <?php echo set_checkbox('status', '2'); ?> /> Publish
		</label>
	</p>
	
	<p>
		<input type="submit" value="Create" />
	</p>
</fieldset>
<?php echo form_close(); ?>