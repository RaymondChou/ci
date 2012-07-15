<div class="post">
	<h3><?php echo $post->title; ?></h3>
	<div class="content">
		<?php echo $post->content; ?>
	</div>
	<div class="date">
		Published: <?php echo time_since($post->published_at); ?>
	</div>
</div>

<?php if (current_user()->is_owner_of($post)): ?>
	<?php echo anchor('posts/edit/'.$post->id, 'Edit'); ?> | 
	<?php echo anchor('posts/destroy/'.$post->id, 'Delete'); ?>
<?php endif; ?>