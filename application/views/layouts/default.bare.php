<!doctype html>
<html>
	<head>
		<title><?php echo $template['title']; ?></title>
		<?php echo $template['metadata']; ?>
		
		<?php echo $this->assets->render_styles(); ?>
		<?php echo $this->assets->render_scripts('head'); ?>
	</head>
	<body>
		<?php render_flash_data(); ?>
	
		<?php echo $template['body']; ?>
		
		<?php echo $this->assets->render_scripts(); ?>
	</body>
</html>