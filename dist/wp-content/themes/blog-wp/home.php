<?php
/*
  Template Name: Home Page
*/

get_header(); ?>

<div class="site-content">

    <?php get_template_part( '/contents/content', 'categories-list'); ?>

    <div class="site-content__layout">

        <h1 class="page-title">Latest posts</h1>

    </div>

    <?php
    $posts = get_all_posts();
    get_template_part( '/contents/content', 'blog'); ?>

</div>

<?php get_footer(); ?>
