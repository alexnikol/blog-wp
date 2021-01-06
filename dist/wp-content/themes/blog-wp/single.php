<?php

/*
	Template Name: Single Page
*/

get_header();

$id = get_the_ID();
$title = get_the_title();
$post_item_category = get_the_terms( $post->ID, 'category' );
$image_source = get_the_post_thumbnail_url();

?>

<div class="site-content">

    <div class="site-content__layout">

    <div class="breadcrumbs">
        <a href="<?= get_permalink(HOME); ?>">Home</a>
        <span><?= $title; ?></span>
    </div>

    <?php $categories = get_main_categories_by_post_id($id); ?>
    <?php if (!is_null($categories)): ?>
        <ul class="tags">
            <?php foreach ($categories as $category): ?>
                <li><a href="<?= get_category_link($category->term_id); ?>"><?= $category->name; ?></a></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <article class="article">
        <div class="article__head">
            <time datetime="<?= get_the_time('Y-m-d'); ?>">
                <?= get_the_time('M j, Y'); ?>
            </time>
        </div>

        <h1><?= $title; ?></h1>

        <?php the_content(); ?>

    </article>

</div>
</div>

<?php get_footer(); ?>
