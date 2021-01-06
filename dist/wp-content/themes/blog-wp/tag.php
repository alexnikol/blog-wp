<?php get_header();

$category = get_queried_object(); ?>

<div class="site-content">

    <h1 class="page-title"><?= $category->name; ?></h1>

    <?php get_template_part( '/contents/content', 'categories-list'); ?>

    <?php
    $posts = get_posts_by_specific_tag_id($category->slug);
    get_template_part( '/contents/content', 'blog'); ?>

</div>

<?php get_footer(); ?>
