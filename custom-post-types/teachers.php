<?php

function custom_post_teachers() {
    /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
    register_post_type('teachers', 
        array('labels' => array(
            'name' => __('Docenti', 'applied-computer-science'), /* This is the Title of the Group */
            'singular_name' => __('Docente', 'applied-computer-science'), /* This is the individual type */
            'all_items' => __('Tutti i docenti', 'applied-computer-science'), /* the all items menu item */
            'add_new' => __('Aggiungi nuovo', 'applied-computer-science'), /* The add new menu item */
            'add_new_item' => __('Aggiungi nuovo docente', 'applied-computer-science'), /* Add New Display Title */
            'edit' => __('Modifica', 'applied-computer-science'), /* Edit Dialog */
            'edit_item' => __('Modifica docente', 'applied-computer-science'), /* Edit Display Title */
            'new_item' => __('Aggiungi nuovo', 'applied-computer-science'), /* New Display Title */
            'view_item' => __('Vedi', 'applied-computer-science'), /* View Display Title */
            'search_items' => __('Cerca', 'applied-computer-science'), /* Search Custom Type Title */
            'not_found' => __('Non trovato.', 'applied-computer-science'), /* This displays if there are no entries yet */
            'not_found_in_trash' => __('Cestino vuoto', 'applied-computer-science'), /* This displays if there is nothing in the trash */
            'parent_item_colon' => ''
        ),
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'show_ui' => true,
        'query_var' => true,
        'menu_position' => 7,
        'has_archive' => false,
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => array('title', 'thumbnail'))
    );

}

add_action('init', 'custom_post_teachers');

?>