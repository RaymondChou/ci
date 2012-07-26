<div class="post" id="<?php echo $post->id; ?>-post">
	<h2 class="title"><a href="<?php echo $post->permalink(); ?>"><?php echo $post->title; ?> </a></h2>
	<p class="meta">Posted by <a href="#">Someone</a> <?php echo time_since($post->published_at); ?>
		&nbsp;&bull;&nbsp; <a href="#" class="comments">Comments (64)</a> &nbsp;&bull;&nbsp; 
		<a href="<?php echo $post->permalink(); ?>" class="permalink">Full article</a></p>
	<div class="entry">
		<?php echo $post->content; ?>
	</div>
</div>

<?php if (current_user() and current_user()->is_owner_of($post)): ?>
	<?php echo anchor('posts/edit/'.$post->id, 'Edit'); ?> | 
	<?php echo anchor('posts/destroy/'.$post->id, 'Delete'); ?>
<?php endif; ?>

<div id="comment-form"></div>
<div id="comments"></div>