<?php partial('header'); ?>

    <section class="c-page">
        <h1 class="c-page_title"><?php echo $page->title(); ?></h1>

        <section class="c-page_body">
            <?php echo $page->content(); ?>
        </section>

    </section>

<?php partial('footer'); ?>
