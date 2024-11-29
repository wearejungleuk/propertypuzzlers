<?php

/**
 * Returns array of posts
 * @param $noOfPosts
 * @param $postType
 * @param $offset
 *
 * @return mixed
 */
function getWpqueryPosts($postType, $noOfPosts = null, $offset = null, $postNotIn = null, $orderBy = null) {
    $postNotIn = ($postNotIn == null) ? '' : $postNotIn;
    $offset = ($offset == null) ? '' : $offset;
    $noOfPosts = ($noOfPosts == null) ? -1 : $noOfPosts;
    $args = [
        'post_type' => $postType,
        'posts_per_page' => $noOfPosts,
        'offset' => $offset,
        'post_status' => 'publish',
        'post__not_in' => [$postNotIn],
        'order' => 'ASC',
        'orderby' => $orderBy,
    ];

    $the_query = new WP_Query($args);

    return $the_query->posts;
}

/**
 * @param $postType
 * @param $taxonomy
 * @param $term
 * @param $noOfPosts
 * @param $offset
 * @return mixed
 */
function getWpqueryTax($postType, $taxonomy, $term, $noOfPosts = null, $offset = null) {
    $offset = ($offset == null) ? '' : $offset;
    $noOfPosts = ($noOfPosts == null) ? -1 : $noOfPosts;
    $args = [
        'post_type' => $postType,
        'posts_per_page' => $noOfPosts,
        'offset' => $offset,
        'post_status' => 'publish',
        'order' => 'ASC',
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomy,
                'field' => 'slug',
                'terms' => $term,
            ),
        ),
    ];

    $the_query = new WP_Query($args);

    return $the_query->posts;
}