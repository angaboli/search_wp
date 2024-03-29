<?php

function tagwalk_supports()
{
  add_theme_support('title-tag');
  add_image_size('card-header', 280, 200, true); // args are : class, width, height, crop
  add_image_size('modal', 600, 600, true); // args are : class, width, height, crop

}

function tagwalk_register_assets()
{
  wp_register_style('tagwalk', trailingslashit(get_stylesheet_directory_uri()) . 'style.css', false, '1.0', 'screen');
  wp_enqueue_style('tagwalk');
  wp_register_script('tagwalk', trailingslashit(get_stylesheet_directory_uri()) . 'scripts.js', false, '1.0', 'screen');
  wp_enqueue_script('tagwalk');
}

function tagwalk_title_separator()
{
  return '|';
}

function tagwalk_media_post()
{

  $taxonomies = array(
    array(
      'slug' => 'categorie',
      'singular_name' => 'Categorie',
      'plural_name' => 'Categories',
      'post_type' => 'patrimoine',
      'rewrite' => array('slug' => 'categorie'),
    ),
    array(
      'slug' => 'etiquette',
      'singular_name' => 'Etiquette',
      'plural_name' => 'Etiquettes',
      'post_type' => 'patrimoine',
      'rewrite' => array('slug' => 'etiquette'),
      'hierarchical' => false
    ),
  );
  foreach ($taxonomies as $taxonomie) {
    $labels = array(
      'name' => _x($taxonomie['plural_name'], 'taxonomy general name', 'portfolio'),
      'singular_name' => _x($taxonomie['singular_name'], 'taxonomy singular name', 'portfolio'),
      'plural_name' => __($taxonomie['plural_name'], 'taxonomy plural name', 'portfolio'),
      'search_items' => __('Recherche des ' . $taxonomie['plural_name'], 'portfolio'),
      'all_items' => __('Tous les ' . $taxonomie['plural_name'], 'portfolio'),
      'edit_item' => __('Modifier une ' . $taxonomie['singular_name'], 'portfolio'),
      'update_item' => __('Mettre à jour', 'portfolio'),
      'add_new_item' => __('Ajouter une ' . $taxonomie['singule_name'], 'portfolio'),
      'new_item_name' => __('Nouveau un nom', 'portfolio'),
      'menu_name' => __($taxonomie['plural_name'], 'portfolio'),
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

  register_post_type('portfolio', [
    'label' => 'Portfolio',
    'public' => true,
    'menu_position' => 4,
    'menu_icon' => 'dashicons-images-alt2',
    'supports' => ['title', 'editor', 'thumbnail'],
    'show_in_rest' => true,
    'taxonomies' => ['categorie', 'etiquette'],
    'has_archive' => true,
  ]);
}

function tagwalk_custom_box()
{
}

/**
 * CUSTOM DEBUG
 *
 * @return void
 */
function dump()
{
  echo '<pre>';

  foreach (func_get_args() as $var) {
    if (is_array($var) || is_object($var)) {
      print_r($var);
    } else {
      var_dump($var);
    }
  }

  echo '</pre>';
}

add_action('init', 'tagwalk_media_post');
add_action('after_setup_theme', 'tagwalk_supports');
add_action('wp_enqueue_scripts', 'tagwalk_register_assets');
add_action('add_meta_boxes', 'tagwalk_custom_box');
add_filter('document_title_separator', 'tagwalk_title_separator');
apply_filters('get_search_form', $form);


/**
 * Import data form .csv file and map them in database 
 */
function get_csv_data()
{

  $handle = fopen(get_stylesheet_directory_uri() . "/inc/import.csv", "r");

  while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
    //dump($data);
    $tag_list = explode(', ', trim($data[2]));
    $title = $tag_list[0];
    $p_post = array(
      'post_title' => $title,
      'tax_input' => [
        'enseigne' => $data[0],
        'campagne' => $data[3],
        'categorie' => $data[4],
        'etiquette' => $data[5],
        'etiquette' => $tag_list,
      ],
      'post_type' => 'patrimoine'
    );
    dump($p_post);

    //wp_insert_post( $p_post );

  }
}

// load more function by ajax
add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');

function load_posts_by_ajax_callback(){
  check_ajax_referer('load_more_posts', 'security');
  $paged= $_POST['page'];

  $args = array(

    'post_type' => 'portfolio',
    'post_status' => 'publish',
    'posts_per_page' => 4,
    'paged' =>$paged,
  );
  $my_posts = new WP_Query($args);

  if ($my_posts-> have_posts()) { 

      while($my_posts-> have_posts()){
        $my_posts-> the_post();
         get_template_part('parts/card');
    }
  }

wp_die();

}

