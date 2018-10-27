<?php partial('header'); ?>

    <section>

        <h1>Posts Archive</h1>

        <?php foreach ($articles as $article): ?>
            <article class="c-news-post">
                <header class="c-news-post__head">
                    <h1 class="c-news-post__title"><?php echo $article->title(); ?></h1>
                </header>

                <section class="c-news-post__body">
                    <?php echo $article->excerpt(); ?>
                </section>

                <footer class="c-news-post__footer">
                    <p class="c-news-post__published-date">
                        <time datetime="<?php echo $article->date('Y-m-d H:i'); ?>">
                            <?php echo $article->date(); ?>
                        </time>
                    </p>
                </footer>
            </article>
        <?php endforeach; ?>

    </section>

<?php partial('footer'); ?>
