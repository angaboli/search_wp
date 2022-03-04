<?php

function tagwalk_supports() {
    add_theme_support( 'title-tag');

}

function tagwalk_register_assets(){
    wp_register_style( 'tagwalk', trailingslashit(get_stylesheet_directory_uri()).'style.css', false, '1.0', 'screen');
    wp_enqueue_style( 'tagwalk' );
}

function tagwalk_title_separator (){
    return '|';

}


function krystalpro_child_load_scripts() {	
	wp_register_style('krystalpro_child_load_style', trailingslashit(get_stylesheet_directory_uri()).'style.css', false, '1.0', 'screen');
	wp_enqueue_style('krystalpro_child_load_style');

	/*--- Adding a js file demo. Paste your js file inside the child theme js folder and add it like the example below ---*/
	//wp_enqueue_script( 'krystalpro-sample-js-demo', trailingslashit(get_stylesheet_directory_uri()) . 'js/samplename.js', array('jquery'), '', true );
}

add_action('after_setup_theme', 'tagwalk_supports');
add_action('wp_enqueue_scripts', 'tagwalk_register_assets');
add_filter( 'document_title_separator', 'tagwalk_title_separator' );