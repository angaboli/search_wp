#WP backend
===========

front-page.php -> homePage
single.php -> Single Post
search.php -> search result page


The loop
--------
`
global $post;
global wp_query;

__________________

Post, categories, .... doc on wp

while(have_post()) : the_post();

<img src=" the_post_thumbnail_url()" alt="" width="100%" height="auto">
<a href="?php get_post_type_archive_link('post') ?> " >Articles</a>
the_post_thumbnails;
the_title;
the_category
the_excerpt;
the_content;
the_permalink;
`

Functions
---------
theme_support 
_____________

register_nav_menu('header')

Walker
-------
To modify classes in a wp HTML elements, navigate trough the php class in order to find a function that can be used to change that.
e.g. `apply_filters('nav_menu_link_attributes', $atts, $args, $depth); `
Add class using a customized function to add a class on exting one.


