<?php echo form_open('signin'); ?>
<fieldset>
	<legend>Sign in </legend>
	<?php if ($message): ?>
	<p class="error">Wrong username and password combination</p>
	<?php endif; ?>
	<p>
		<label for="signin_username">Username</label> <br/>
		<input type="text" name="username" id="signin_username" />
	</p>
	<p>
		<label for="signin_password">Password</label><br/>
		<input type="password" name="password" id="signin_password" />
	</p>
	<p>
		<input type="submit" value="Sign in" /> <?php echo anchor('signup', 'Sign Up'); ?>
	</p>
</fieldset>
<?php echo form_close(); ?>