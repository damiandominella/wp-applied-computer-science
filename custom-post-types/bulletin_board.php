<?php

function custom_post_bulletin_board() {
    /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
    register_post_type('bulletin_board', 
            // let's now add all the options for this post type
        array('labels' => array(
            'name' => __('Bacheca', 'stitheme'), /* This is the Title of the Group */
            'singular_name' => __('Annuncio', 'stitheme'), /* This is the individual type */
            'all_items' => __('Tutti gli annunci', 'stitheme'), /* the all items menu item */
            'add_new' => __('Aggiungi nuovo', 'stitheme'), /* The add new menu item */
            'add_new_item' => __('Aggiungi nuovo annuncio', 'stitheme'), /* Add New Display Title */
            'edit' => __('Modifica', 'stitheme'), /* Edit Dialog */
            'edit_item' => __('Modifica annuncio', 'stitheme'), /* Edit Display Title */
            'new_item' => __('Aggiungi nuovo', 'stitheme'), /* New Display Title */
            'view_item' => __('Vedi', 'stitheme'), /* View Display Title */
            'search_items' => __('Cerca', 'stitheme'), /* Search Custom Type Title */
            'not_found' => __('Non trovato.', 'stitheme'), /* This displays if there are no entries yet */
            'not_found_in_trash' => __('Cestino vuoto', 'stitheme'), /* This displays if there is nothing in the trash */
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

    /* this ads your post categories to your custom post type */
    //register_taxonomy_for_object_type('category', 'bulletin_board');
    /* this ads your post tags to your custom post type */
    //register_taxonomy_for_object_type('post_tag', 'custom_type');
}

add_action('init', 'custom_post_bulletin_board');

/*
  for more information on taxonomies, go here:
  http://codex.wordpress.org/Function_Reference/register_taxonomy
 */


//register_taxonomy('custom_cat', array('bulletin_board'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
//    array(
//    'hierarchical' => true, /* if this is true it acts like categories */
//    'labels' => array(
//        'name' => __('Categorie', 'stitheme'), /* name of the custom taxonomy */
//        'singular_name' => __('Categoria', 'stitheme'), /* single taxonomy name */
//        'search_items' => __('Search Custom Categories', 'stitheme'), /* search title for taxomony */
//        'all_items' => __('All Custom Categories', 'stitheme'), /* all title for taxonomies */
//        'parent_item' => __('Parent Custom Category', 'stitheme'), /* parent title for taxonomy */
//        'parent_item_colon' => __('Parent Custom Category:', 'stitheme'), /* parent taxonomy title */
//        'edit_item' => __('Edit Custom Category', 'stitheme'), /* edit custom taxonomy title */
//        'update_item' => __('Update Custom Category', 'stitheme'), /* update title for taxonomy */
//        'add_new_item' => __('Add New Custom Category', 'stitheme'), /* add new title for taxonomy */
//        'new_item_name' => __('New Custom Category Name', 'stitheme') /* name title for taxonomy */
//    ),
//    'show_ui' => true,
//    'query_var' => true,
//    'show_in_nav_menus' => true
//));


?>