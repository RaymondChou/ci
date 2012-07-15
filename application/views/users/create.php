<?php echo form_open('signup'); ?>
<fieldset>
	<legend>Sign Up</legend>
	<?php echo display_errors($errors); ?>
	<p>
		<label for="signup_username">Username</label><br/>
		<input type="text" name="username" id="signup_username" value="<?php echo set_value('username'); ?>" />
	</p>
	<p>
		<label for="signup_email">Email</label><br/>
		<input type="text" name="email" id="signup_email" value="<?php echo set_value('email'); ?>" />
	</p>
	<p>
		<label for="signup_password">Password</label><br/>
		<input type="password" name="password" id="signup_password" value=""/>
	</p>
	<p>
		<label for="signup_password_confirmation">Confirm</label><br/>
		<input type="password" name="password_confirmation" id="signup_password_confirmation" value="" />
	</p>
	<p>
		<input type="submit" value="Sign Up" /> <?php echo anchor('signin', 'Sign In'); ?>
	</p>
</fieldset>
<?php echo form_close(); ?>