<?php
/*
  Template Name: Home Page
*/

get_header(); ?>

<div class="site-content">
    <div class="site-content__layout">

        <div class="breadcrumbs">
            <a href="#">Home</a>
            <span>Blog</span>
        </div>

        <h1 class="page-title">Posts</h1>

    </div>

    <?php get_template_part( '/contents/content', 'blog'); ?>

</div>

<?php get_footer(); ?>
