<div class="error">
	<?php echo count($errors); ?> <?php echo count($errors) > 1 ? 'errors' : 'error'; ?> occurred while saving the record
	<ul>
	<?php foreach ($errors as $error): ?>
		<li><?php echo $error; ?></li>
	<?php endforeach; ?>
	</ul>
</div>
