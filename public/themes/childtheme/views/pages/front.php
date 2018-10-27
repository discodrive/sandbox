<?php partial('header'); ?>

    <?php foreach($allPosts as $news): ?>
        <?php partial('shared/news-block', compact('news'));?>
    <?php endforeach;?>

<?php partial('footer'); ?>
