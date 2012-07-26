<?php foreach ($comments as $comment): ?>
<div class="comment boxed">
    <p>
        <?php echo gravatar_for($comment->email); ?> <?php echo $comment->username; ?>
    </p>
    <div class="content">
        <?php echo $comment->content; ?>
    </div>
    <div class="date">
        Commented: <?php echo time_since($comment->created_at); ?>
    </div>
</div>
<?php endforeach; ?>

<?php echo $pagination; ?>
