<?php

function tagwalk_supports() {
    add_theme_support( 'title-tag');
    add_image_size('card-header', 350, 200, true); // args are : class, width, height, crop

}

function tagwalk_register_assets(){
    wp_register_style( 'tagwalk', trailingslashit(get_stylesheet_directory_uri()).'style.css', false, '1.0', 'screen');
    wp_enqueue_style( 'tagwalk' );
    wp_register_script('tagwalk', trailingslashit(get_stylesheet_directory_uri()).'scripts.js');
    wp_enqueue_script( 'tagwalk' );
}

function tagwalk_title_separator (){
    return '|';

}

function tagwalk_media_post(){

    $taxonomies = array(
        array(
          'slug' => 'categorie',
          'singular_name' => 'Categorie',
          'plural_name' => 'Categories',
          'post_type' => 'patrimoine',
          'rewrite' => array('slug' => 'categorie'),
        ),
        array(
          'slug' => 'tendance',
          'singular_name' => 'Tendance',
          'plural_name' => 'Tendances',
          'post_type' => 'patrimoine',
          'rewrite' => array('slug' => 'tendance'),
        ),
      );
      foreach ($taxonomies as $taxonomie) {
        $labels = array(
          'name' => _x($taxonomie['plural_name'], 'taxonomy general name', 'textdomain'),
          'singular_name' => _x($taxonomie['singular_name'], 'taxonomy singular name', 'textdomain'),
          'plural_name' => __($taxonomie['plural_name'], 'taxonomy plural name', 'textdomain'),
          'search_items' => __('Recherche des ' . $taxonomie['plural_name'], 'textdomain'),
          'all_items' => __('Tous les ' . $taxonomie['plural_name'], 'textdomain'),
          'edit_item' => __('Modifier une ' . $taxonomie['singular_name'], 'textdomain'),
          'update_item' => __('Mettre à jour', 'textdomain'),
          'add_new_item' => __('Ajouter une ' . $taxonomie['singule_name'], 'textdomain'),
          'new_item_name' => __('Nouveau un nom', 'textdomain'),
          'menu_name' => __($taxonomie['plural_name'], 'textdomain'),
        );
        $rewrite = isset($taxonomie['rewrite']) ? $taxonomie['rewrite'] : array('slug' => $taxonomie['slug']);
        $hierarchical = isset($taxonomie['hierarchical']) ? $taxonomie['hierarchical'] : true;
    
        register_taxonomy(
          $taxonomie['slug'],
          $taxonomie['post_type'],
          array(
            'hierarchical' => $hierarchical,
            'labels' => $labels,
            'show_in_rest' => true,
            'show_ui' => true,
            'query_var' => true,
            'rerwite' => $rewrite,
          )
        );
      }

    register_post_type('gallery', [
        'label' => 'Gallery',
        'public' => true,
        'menu_position' => 4,
        'menu_icon' => 'dashicons-images-alt2',
        'supports' => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true,
        'taxonomies' => ['categorie', 'tendance'],
        'has_archive' => true,
    ]);
}

function tagwalk_custom_box(){

}

add_action('init', 'tagwalk_media_post');
add_action('after_setup_theme', 'tagwalk_supports');
add_action('wp_enqueue_scripts', 'tagwalk_register_assets');
add_action('add_meta_boxes', 'tagwalk_custom_box');
add_filter( 'document_title_separator', 'tagwalk_title_separator' );
apply_filters( 'get_search_form', $form );