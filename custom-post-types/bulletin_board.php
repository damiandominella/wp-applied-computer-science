<?php

function custom_post_bulletin_board() {
    /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
    register_post_type('bulletin_board', 
            // let's now add all the options for this post type
        array('labels' => array(
            'name' => __('Bacheca', 'applied-computer-science'), /* This is the Title of the Group */
            'singular_name' => __('Annuncio', 'applied-computer-science'), /* This is the individual type */
            'all_items' => __('Tutti gli annunci', 'applied-computer-science'), /* the all items menu item */
            'add_new' => __('Aggiungi nuovo', 'applied-computer-science'), /* The add new menu item */
            'add_new_item' => __('Aggiungi nuovo annuncio', 'applied-computer-science'), /* Add New Display Title */
            'edit' => __('Modifica', 'applied-computer-science'), /* Edit Dialog */
            'edit_item' => __('Modifica annuncio', 'applied-computer-science'), /* Edit Display Title */
            'new_item' => __('Aggiungi nuovo', 'applied-computer-science'), /* New Display Title */
            'view_item' => __('Vedi', 'applied-computer-science'), /* View Display Title */
            'search_items' => __('Cerca', 'applied-computer-science'), /* Search Custom Type Title */
            'not_found' => __('Non trovato.', 'applied-computer-science'), /* This displays if there are no entries yet */
            'not_found_in_trash' => __('Cestino vuoto', 'applied-computer-science'), /* This displays if there is nothing in the trash */
            'parent_item_colon' => ''
        ), /* end of arrays */
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'show_ui' => true,
        'query_var' => true,
        'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */
        //'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
        'rewrite' => array('slug' => 'bulletin-board', 'with_front' => true, 'feeds' => true), /* you can specify it's url slug */
//        'has_archive' => '...', /* you can rename the slug here */
        'has_archive' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        /* the next one is important, it tells what's enabled in the post editor */
        'supports' => array('title', 'editor', 'author', 'thumbnail')
            ) /* end of options */
    ); /* end of register post type */
}

add_action('init', 'custom_post_bulletin_board');
?>