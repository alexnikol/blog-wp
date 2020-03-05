<?php
    get_header();
?>

<div class="search-page">

    <div class="hero-article">

        <img src="<?= DIRECT ?>img/back_good_hero_2.jpg" alt="img">

        <div class="hero-article__layout">

            <div class="hero-article__content">
                <?php if ( have_posts() ) : ?>
                    <h2>Search results for: <?= get_search_query() ?></h2>
                <?php else : ?>
                    <h2>Nothing found for: <?= get_search_query() ?></h2>
                <?php endif; ?>
            </div>

            <a href="<?= get_permalink(BLOG) ?>" class="btn btn--color-1 btn--type-5"><span>Back</span></a>

        </div>

    </div>

	    <?php if ( have_posts() ) : ?>

        <div class="site__layout">
            <div class="blog">

            <?php while ( have_posts() ) : the_post(); ?>

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

		<?php endwhile;  ?>

            </div>
        </div>


        <?php else : ?>

        <div class="article">
            <div class="search-page__empty">

                <p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>

	            <?php get_search_form(); ?>

            </div>
        </div>

        <?php endif; ?>

</div>

<?php get_footer();
