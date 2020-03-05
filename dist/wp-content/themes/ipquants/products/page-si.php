<?php

    /*
        Template Name: Product SI
    */

    get_header();
    $product_content= get_field('product_content');
    $about_product_description = get_field('about_product_description');
    $about_product_footer = get_field('about_product_footer');
    $product_presentation = get_field('product_presentation');
    $product_presentation_content = get_sub_field('product_presentation_content');
    $product_presentation_image = get_sub_field('product_presentation_image');

?>

    <div class="hero-inner js-back-picture">

        <img src="<?= DIRECT ?>img/back_good_hero.jpg" alt="img"/>

        <div class="hero-inner__layout">

            <div class="hero-inner__content">
                <h2><?= get_the_title(); ?></h2>
                <?= $product_content; ?>
            </div>

            <?php get_template_part( '/contents/content', 'subscribe'); ?>

        </div>

    </div>

    <div class="about-product">

        <?= $about_product_description; ?>

        <div class="about-product__footer">
            <?= $about_product_footer; ?>
        </div>
    </div>

    <div class="product">

        <div class="product__wrap">

        <?php foreach ($product_presentation as $key => $item):
            $product_presentation_content = $item['product_presentation_content'];
            $product_presentation_image = $item['product_presentation_image'];
        ?>

        <div class="product__item">

            <div class="product__content">
                <?= $product_presentation_content; ?>
            </div>

            <div class="product__picture">
                <img src="<?= $product_presentation_image; ?>" alt="img"/>
            </div>

        </div>

        <?php if ($key === 1): ?>
            <img src="<?= DIRECT ?>img/product-si-back.png" alt="img"/>
            </div>
        <?php endif; ?>

        <?php endforeach; ?>

    </div>

    <!-- request-demo -->
    <div class="request-demo">

        <div class="request-demo__layout">

            <div class="request-demo__content">
                <p>Want to answer your innovation questions faster?</p>
            </div>

            <a href="<?= get_permalink( DEMO ) ?>" class="btn btn--color-2 btn--type-3" target="_blank"><span>request a demo</span></a>

        </div>

    </div>
    <!-- /request-demo -->

<?php get_footer(); ?>