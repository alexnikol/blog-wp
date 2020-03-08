<?php

/*
	Template Name: Single Page
*/

get_header();

$post_item_category = get_the_terms( $post->ID, 'category' );

$image_source = get_the_post_thumbnail_url();

?>

    <div class="hero-article">

        <img src="<?= DIRECT ?>pic/background.jpg" alt="img"/>

        <div class="hero-article__layout">

            <div class="hero-article__content">
                <h2>Software Development Blog</h2>
            </div>

            <a href="<?= get_permalink(HOME) ?>" class="btn btn--color-1 btn--type-5"><span>Back</span></a>

        </div>

    </div>

    <div class="site__wrap">

        <div class="site__article">

            <div class="article">

                <!-- blog__date -->
                <time datetime="<?= get_the_time('Y-m-d', $row); ?>">
                    <?= get_the_time('M j, Y', $row); ?>
                </time>
                <!-- /blog__date -->

                <h1><?= get_the_title(); ?></h1>

                <?= wpautop( get_post_field('post_content' ) ); ?>

            </div>

        </div>

        <?php $args = array(
            'post_type'     => 'post',
            'posts_per_page'=> 2,
            'orderby'       => 'date',
            'order'         => 'DESC',
            'fields'        => 'ids',
            'post_status'   => 'publish',
            'suppress_filters' => false
        );

        $posts = get_posts( $args );

        if( $posts ) { ?>

            <!-- blog-recent -->
            <section class="blog-recent">

                <h2 class="blog-recent__title">
                    <span>Recent Posts</span>
                </h2>

                <?php foreach ( $posts as $row ) { ?>

                    <!-- blog__item -->
                    <article class="blog__item">

                        <!-- blog__date -->
                        <time datetime="<?= get_the_time('Y-m-d', $row); ?>" class="blog__date">
                            <?= get_the_time('M j, Y', $row); ?>
                        </time>
                        <!-- /blog__date -->

                        <h2 class="blog__topic"><?= get_the_title($row); ?></h2>

                        <p><?= get_the_excerpt( $row ); ?></p>

                        <a href="<?= get_permalink($row); ?>" class="blog__more">READ MORE</a>

                    </article>
                    <!-- /blog__item -->

                <?php } ?>

            </section>
            <!-- /blog-recent -->

        <?php } ?>
    </div>

<?php get_footer(); ?>
