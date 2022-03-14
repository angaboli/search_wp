<?php get_header() ?>

<main class="main">


    <?php
    $args = array(
        'post_type' => 'gallery',
        'order'    => 'ASC',
        'posts_per_page' => 9,
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