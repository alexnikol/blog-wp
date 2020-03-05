<?php

    /*
        Template Name: Research Page
    */

    get_header();

    $research_description = get_field('research_description');
    $research_list = get_field('research_list');
    $research_title = get_sub_field('research_title');
    $research_content = get_sub_field('research_content');

?>

    <div class="hero-inner hero-inner--about-us js-back-picture">

        <img src="<?= DIRECT ?>img/back_good_hero_2.jpg" alt="img"/>

        <div class="hero-inner__layout">

            <div class="hero-inner__content">
                <h2><?= get_the_title(); ?></h2>
                <?= $research_description; ?>
            </div>

            <?php get_template_part( '/contents/content', 'subscribe'); ?>

        </div>

    </div>

    <!-- case -->
    <div class="case">

        <?php foreach ($research_list as $key => $item):
                $research_title = $item['research_title'];
                $research_content = $item['research_content'];
            ?>

        <div class="case__item">

            <div class="case__aside">
                <h2><?= $research_title; ?></h2>
            </div>

            <div class="case__content">
                <?= $research_content; ?>
            </div>

        </div>

                <?php
                if ( count( $item ) === $key):
                    continue;
                elseif ($key % 2 == 0): ?>
                    <div class="case__deco case__deco--left"></div>
                <?php elseif ($key % 2 == 1): ?>
                    <div class="case__deco case__deco--right"></div>
                <?php endif; ?>

        <?php endforeach; ?>

    </div>
    <!-- /case -->

    <!-- request-demo -->
    <div class="request-demo">

        <div class="request-demo__layout">

            <div class="request-demo__content">
                <p>Want to see your innovation statistics?</p>
            </div>

            <a href="<?= get_permalink( DEMO ) ?>" class="btn btn--color-2 btn--type-3" target="_blank"><span>request a demo</span></a>

        </div>

    </div>
    <!-- /request-demo -->

<?php get_footer(); ?>