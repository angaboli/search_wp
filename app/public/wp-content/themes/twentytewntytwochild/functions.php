<?php

function tagwalk_supports() {
    add_theme_support( 'title-tag');

}

function tagwalk_register_assets(){
    wp_register_style( 'tagwalk', 'style.css' );
    wp_enqueue_style( 'tagwalk' );
}

function tagwalk_title_separator (){
    return '|';

}


add_action('after_setup_theme', 'tagwalk_supports');
add_action('wp_enqueue_scripts', 'tagwalk_register_assets');
add_filter( 'document_title_separator', 'tagwalk_title_separator' );