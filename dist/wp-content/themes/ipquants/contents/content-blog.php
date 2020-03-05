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

<!-- request-demo -->
<div class="request-demo request-demo--deco">

    <div class="request-demo__layout">

        <div class="request-demo__content">
            <p>Subscribe and stay up to date with new articles</p>
        </div>
        <div class="hero-inner__subscribe">
            <div class="subscribe">

                <form class="subscribe" novalidate>
                    <label>
                        <input type="email" name="your-email" placeholder="Enter your Email" required />
                        <button type="submit" class="btn btn--color-1 btn--type-4" data-popup="permission-subscribe"><span>SIGN UP</span></button>
                    </label>
                </form>

            </div>
        </div>
<!--        <a href="--><?//= DEMO ?><!--" class="btn btn--color-2 btn--type-3" target="_blank"><span>request a demo</span></a>-->

    </div>

</div>
<!-- /request-demo -->