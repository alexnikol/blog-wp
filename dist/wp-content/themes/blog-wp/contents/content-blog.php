<?php get_template_part( '/contents/head', 'blog'); ?>

<!-- site__wrap -->
<div class="site__layout">

    <?php get_template_part( '/contents/content', 'aside'); ?>

    <!-- site__content -->
    <div class="site__content">

        <!-- blog -->
        <div class="blog">

	        <?php foreach ($posts as $row) { ?>

                <!-- blog__item -->
                <article class="blog__item">

                    <!-- blog__date -->
                    <time datetime="<?= get_the_time('Y-m-d', $row); ?>" class="blog__date">
                        <?= get_the_time('M j, Y', $row); ?>
                    </time>
                    <!-- /blog__date -->

                    <h2 class="blog__topic"><?= get_the_title($row); ?></h2>

                    <p><?= get_the_excerpt( $row ); ?></p>

                    <a href="<?= get_permalink( $row ); ?>" class="blog__more">READ MORE</a>

                </article>
                <!-- /blog__item -->

	        <?php } ?>

        </div>
        <!-- /blog -->

        <?= get_the_posts_pagination() ?>

    </div>
    <!-- /site__content -->

</div>
<!-- /site__wrap -->