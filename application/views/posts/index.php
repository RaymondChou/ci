<?php if ($posts): ?>
	<div class="posts">
	<?php foreach ($posts as $post): ?>
		<div class="post">
			<h3><?php echo anchor($post->permalink(), $post->title); ?></h3>
			<div class="content">
				<?php echo $post->content; ?>
			</div>
			<div class="date">
				Published: <?php echo time_since($post->published_at); ?>
			</div>
		</div>
	<?php endforeach; ?>
	</div>
	<?php echo $pagination; ?>
<?php else: ?>
	<p>No Posts Yet!</p>
<?php endif; ?>

<?php if (current_user() and current_user()->is_editor()): ?>
	<?php echo anchor('posts/create', 'Create Post'); ?>
<?php endif; ?>