<?php if ($posts): ?>
	<?php foreach ($posts as $post): ?>
	<div class="post">
		<h2 class="title"><a href="<?php echo $post->permalink(); ?>"><?php echo $post->title; ?> </a></h2>
		<p class="meta">Posted by <a href="#">Someone</a> <?php echo time_since($post->published_at); ?>
			&nbsp;&bull;&nbsp; <a href="#" class="comments">Comments (64)</a> &nbsp;&bull;&nbsp; 
			<a href="<?php echo $post->permalink(); ?>" class="permalink">Full article</a></p>
		<div class="entry">
			<?php echo $post->content; ?>
		</div>
	</div>
	<?php endforeach; ?>
	<?php echo $pagination; ?>
<?php else: ?>
	<p>No Posts Yet!</p>
<?php endif; ?>

<?php if (current_user() and current_user()->is_editor()): ?>
	<?php echo anchor('posts/create', 'Create Post'); ?>
<?php endif; ?>