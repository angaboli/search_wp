<?php get_header() ?>

<main class="main">


    <?php

    $taxonomy_slug = esc_html(get_query_var('taxonomy'));
    $term_slug = esc_html(get_query_var('term'));
    $args = array(
        'post_type' => 'portfolio',
        'order'    => 'ASC',
        'posts_per_page' => 9,
        'tax_query' => [
            [
              'taxonomy' => $taxonomy_slug,
              'field' => 'slug',
              'terms' => $term_slug,
            ]
          ],
    );

    $the_query = new WP_Query($args);

    if ($the_query->have_posts()) : ?>

        <?php while ($the_query->have_posts()) :

            $the_query->the_post();


            get_template_part('parts/card');

        endwhile ?>


    <?php else : ?>
        <h1>Pas d'articles</h1>
    <?php endif; ?>

</main>

<?php get_footer() ?>