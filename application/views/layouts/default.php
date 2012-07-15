<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Rain on Leaves  
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20101114

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $template['title']; ?></title>
<?php echo $template['metadata']; ?>
<?php echo $this->assets->render_styles(); ?>
<?php echo $this->assets->render_scripts('head'); ?>
</head>
<body>
<div id="wrapper">
	<div id="menu">
		<ul>
			<li class="current_page_item"><span><a href="<?php echo site_url('/'); ?>">Home</a></span></li>
			<li><a href="#">Photos</a></li>
			<li><a href="<?php echo site_url('site/about'); ?>">About</a></li>
			<li><a href="<?php echo site_url('site/links'); ?>">Links</a></li>
			<li><a href="<?php echo site_url('site/contact'); ?>">Contact</a></li>
		</ul>
	</div>
	<!-- end #menu -->
	<div id="header">
		<div id="logo">
			<h1><a href="<?php echo site_url('/'); ?>">Rain on Leaves</a></h1>
			<p>Template Design by CSS Template</p>
		</div>
	</div>
	<!-- end #header -->
	<div id="page">
		<div id="content">
			<?php render_flash_data(); ?>
		
			<?php echo $template['body']; ?>
			<div style="clear: both;">&nbsp;</div>
		</div>
		<!-- end #content -->
		<div id="sidebar">
			<ul>
				<li>
					<h2>Aliquam tempus</h2>
					<p>Mauris vitae nisl nec metus placerat perdiet est. Phasellus dapibus semper consectetuer hendrerit.</p>
				</li>
				<li>
					<h2>Categories</h2>
					<ul>
						<li><a href="#">Aliquam libero</a></li>
						<li><a href="#">Consectetuer adipiscing elit</a></li>
						<li><a href="#">Metus aliquam pellentesque</a></li>
						<li><a href="#">Suspendisse iaculis mauris</a></li>
						<li><a href="#">Urnanet non molestie semper</a></li>
						<li><a href="#">Proin gravida orci porttitor</a></li>
					</ul>
				</li>
				<li>
					<h2>Blogroll</h2>
					<ul>
						<li><a href="#">Aliquam libero</a></li>
						<li><a href="#">Consectetuer adipiscing elit</a></li>
						<li><a href="#">Metus aliquam pellentesque</a></li>
						<li><a href="#">Suspendisse iaculis mauris</a></li>
						<li><a href="#">Urnanet non molestie semper</a></li>
						<li><a href="#">Proin gravida orci porttitor</a></li>
					</ul>
				</li>
				<li>
					<h2>Archives</h2>
					<ul>
						<li><a href="#">Aliquam libero</a></li>
						<li><a href="#">Consectetuer adipiscing elit</a></li>
						<li><a href="#">Metus aliquam pellentesque</a></li>
						<li><a href="#">Suspendisse iaculis mauris</a></li>
						<li><a href="#">Urnanet non molestie semper</a></li>
						<li><a href="#">Proin gravida orci porttitor</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
</div>
<div id="footer-wrapper">
	<div id="three-columns">
		<div id="column1">
			<h2>Consectetuer</h2>
			<ul>
				<li><a href="#">Aliquam libero</a></li>
				<li><a href="#">Consectetuer adipiscing elit</a></li>
				<li><a href="#">Metus aliquam pellentesque</a></li>
				<li><a href="#">Suspendisse iaculis mauris</a></li>
				<li><a href="#">Urnanet non molestie semper</a></li>
				<li><a href="#">Proin gravida orci porttitor</a></li>
			</ul>
		</div>
		<div id="column2">
			<h2>Suspendisse</h2>
			<ul>
				<li><a href="#">Aliquam libero</a></li>
				<li><a href="#">Consectetuer adipiscing elit</a></li>
				<li><a href="#">Metus aliquam pellentesque</a></li>
				<li><a href="#">Suspendisse iaculis mauris</a></li>
				<li><a href="#">Urnanet non molestie semper</a></li>
				<li><a href="#">Proin gravida orci porttitor</a></li>
			</ul>
		</div>
		<div id="column3">
			<h2>Pellentesque</h2>
			<ul>
				<li><a href="#">Aliquam libero</a></li>
				<li><a href="#">Consectetuer adipiscing elit</a></li>
				<li><a href="#">Metus aliquam pellentesque</a></li>
				<li><a href="#">Suspendisse iaculis mauris</a></li>
				<li><a href="#">Urnanet non molestie semper</a></li>
				<li><a href="#">Proin gravida orci porttitor</a></li>
			</ul>
		</div>
	</div>
	<div id="footer">
		<p>Copyright (c) 2008 Sitename.com. All rights reserved. Design by <a href="http://www.freecsstemplates.org/">FCT</a>.</p>
	</div>
	<!-- end #footer -->
</div>

<?php echo $this->assets->render_scripts(); ?>
</body>
</html>
