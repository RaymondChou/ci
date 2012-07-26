<?php echo form_open('comments/create/'.$post_id); ?>
<fieldset>
    <legend>Comment this article</legend>
    <?php echo display_errors($errors); ?>
    <p>
        <label for="comment_username">Username</label><br/>
        <input type="text" name="username" id="comment_username" value="<?php echo set_value('username'); ?>" />
    </p>
    <p>
        <label for="comment_email">Email</label><br/>
        <input type="text" name="email" id="comment_email" value="<?php echo set_value('email'); ?>" />
    </p>
    <p>
        <label for="comment_content">Content</label><br/>
        <textarea name="content" id="comment_content"><?php echo set_value('content'); ?></textarea>
    </p>
    <p>
        <input type="submit" value="Comment" />
    </p>
</fieldset>
<?php echo form_close(); ?>