<?php

function tagwalk_supports() {
    add_theme_support( 'title-tag');
    add_image_size('card-header', 350, 200, true); // args are : class, width, height, crop

}

function tagwalk_register_assets(){
    wp_register_style( 'tagwalk', trailingslashit(get_stylesheet_directory_uri()).'style.css', false, '1.0', 'screen');
    wp_enqueue_style( 'tagwalk' );
}

function tagwalk_title_separator (){
    return '|';

}

function tagwalk_media_post(){
    register_post_type('gallery', [
        'label' => 'Gallery',
        'public' => true,
        'menu_position' => 3,
        'menu_icon' => 'dashicons-images-alt2',
        'supports' => ['title', 'editor', 'thumbnail']
    ]);
}

add_action('init', 'tagwalk_media_post');
add_action('after_setup_theme', 'tagwalk_supports');
add_action('wp_enqueue_scripts', 'tagwalk_register_assets');
add_filter( 'document_title_separator', 'tagwalk_title_separator' );
apply_filters( 'get_search_form', $form );