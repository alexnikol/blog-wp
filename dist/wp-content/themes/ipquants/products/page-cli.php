<?php

    /*
        Template Name: Product CLI
    */

    get_header();
    $customers = get_field('customers', 6);
    $picture = get_sub_field('picture');
    $link = get_sub_field('link');
    $main_title = get_field('main_title');
    $main_content = get_field('main_content');
    $description_title = get_field('description_title');
    $description_content = get_field('description_content');

?>

    <div class="hero-inner hero-inner--about-us js-back-picture">

        <img src="<?= DIRECT ?>img/back_good_hero.jpg" alt="img"/>

        <div class="hero-inner__layout">

            <div class="hero-inner__content">
                <h2><?= get_the_title(); ?></h2>
                <?= $product_content; ?>
            </div>

            <?php get_template_part( '/contents/content', 'subscribe'); ?>

        </div>

    </div>

    <div class="case">

        <div class="case__item">

            <div class="case__aside">
                <h2><?= $main_title; ?></h2>
            </div>

            <div class="case__content">
                <?= $main_content; ?>
            </div>

        </div>

        <div class="case__deco case__deco--left"></div>

        <div class="case__item">

            <div class="case__aside">
                <h2><?= $description_title; ?></h2>
            </div>

            <div class="case__content">
                <?= $description_content; ?>
            </div>

        </div>

        <!-- partners -->
        <div class="partners">

            <div class="partners__layout">

                <?php foreach ($customers as $item):
                    $picture = $item['picture'];
                    $link = $item['link'];

                    if($link):
                        ?>
                        <a href="<?= $link ?>" class="partners__item">
                            <img src="<?= $picture; ?>"  alt="partners"/>
                        </a>
                    <?php else: ?>
                        <span class="partners__item">
                    <img src="<?= $picture; ?>"  alt="partners"/>
                </span>
                    <?php endif; ?>

                <?php endforeach; ?>

            </div>

        </div>
        <!-- /partners -->

        <!-- boa-page__insights -->
        <div class="boa-page__insights">

            <?php

            $promo = get_field( 'appeal_insights_picture' );

            if ( $promo != '' ) {

                ?>

                <!-- boa-page__insights-promo -->
                <div class="boa-page__insights-promo">

                    <div class="boa-page__insights-picture">
                        <img src="<?php the_field( 'appeal_insights_picture' ) ?>" alt="Appeal Insights"/>
                    </div>

                    <?php $list = get_field( 'appeal_insights_list' );

                    if ( $list ) { ?>

                        <!-- boa-page__insights-legend -->
                        <ul class="boa-page__insights-legend">

                            <?php foreach ( $list as $item) { ?>

                                <li><span><?= $item[ 'text' ] ?></span></li>

                            <?php } ?>

                        </ul>
                        <!-- /boa-page__insights-legend -->

                    <?php } ?>

                </div>
                <!-- /boa-page__insights-promo -->

            <?php } ?>

        </div>
        <!-- /boa-page__insights -->

    </div>

    <!-- request-demo -->
    <div class="request-demo">

        <div class="request-demo__layout">

            <div class="request-demo__content">
                <p>Learn how Big Data Can make a big difference!</p>
            </div>

            <a href="<?= get_permalink( DEMO ) ?>" class="btn btn--color-2 btn--type-3" target="_blank"><span>request a demo</span></a>

        </div>

    </div>
    <!-- /request-demo -->

<?php get_footer(); ?>