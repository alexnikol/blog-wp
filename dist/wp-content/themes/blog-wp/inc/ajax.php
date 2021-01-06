<?php

function get_all_posts() {
    return get_posts( array(
        'numberposts' => -1,
        'category'    => 0,
        'orderby'     => 'date',
        'order'       => 'DESC',
        'include'     => array(),
        'exclude'     => array(),
        'meta_key'    => '',
        'meta_value'  =>'',
        'post_type'   => 'post',
        'suppress_filters' => true,
    ) );
}

function get_posts_by_specific_category_id($cat_id) {
    return get_posts( array(
        'numberposts' => -1,
        'category'    => $cat_id,
        'orderby'     => 'date',
        'order'       => 'DESC',
        'include'     => array(),
        'exclude'     => array(),
        'meta_key'    => '',
        'meta_value'  =>'',
        'post_type'   => 'post',
        'suppress_filters' => true,
    ) );
}

function get_main_categories_list() {
    $argh = array(
        'include' => array(7, 9, 54, 57, 31, 14)
    );
    return get_tags($argh);
}

function get_main_categories_by_post_id($post_id) {
    $argh = array(
        'include' => array(7, 9, 54, 57, 31, 14)
    );
    return wp_get_post_tags($post_id, $argh);
}

function get_posts_by_specific_tag_id($tag_slug) {
    return get_posts( array(
        'numberposts' => -1,
        'tag'    => $tag_slug,
        'orderby'     => 'date',
        'order'       => 'DESC',
        'include'     => array(),
        'exclude'     => array(),
        'meta_key'    => '',
        'meta_value'  =>'',
        'post_type'   => 'post',
        'suppress_filters' => true,
    ) );
}
