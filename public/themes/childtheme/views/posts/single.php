<?php partial('header'); ?>

    <section>
        <article class="c-post">
            <header class="c-post__title">
                <h1><?php echo $page->title(); ?></h1>
            </header>

            <section class="c-post__body">
                <?php echo $page->content(); ?>
            </section>

            <footer class="c-post__footer">
                <p class="c-post__published-date">
                    <time datetime="<?php echo $page->date('Y-m-d H:i'); ?>">
                        <?php echo $page->date(); ?>
                    </time>
                </p>
            </footer>
        </article>
    </section>

<?php partial('footer'); ?>