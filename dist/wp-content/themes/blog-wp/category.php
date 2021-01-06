<?php get_header();

$category = get_the_category()[0];
?>

<div class="site-content">

    <?php get_template_part( '/contents/content', 'categories-list'); ?>

    <div class="site-content__layout">

        <h1 class="page-title"><?= $category->name; ?></h1>

    </div>

    <?php
    $posts = get_posts_by_specific_category_id($category->term_id);
    get_template_part( '/contents/content', 'blog'); ?>

</div>

<?php get_footer(); ?>
