<?php get_header();
//$data = get_csv_data();
//dump($data);

?>

<main class="main">


    <?php

    $args = array(
        'post_type' => 'portfolio',
        'order'    => 'ASC',
        'posts_per_page' => 3,
        'paged' => get_query_var('paged', 1),
        'post_status' => 'published',
    );

    $the_query = new WP_Query($args);

    if ($the_query->have_posts()) : ?>

        <div class="listing">


            <?php while ($the_query->have_posts()) :

                $the_query->the_post();

                get_template_part('parts/card');

            endwhile; ?>

        </div>

        <?php
        wp_reset_postdata();
        if ($the_query->max_num_pages > 1) :
        ?>
            <div class="loadmore_button">
                <a href="#" class="btn loadmore">Load More</a>
            </div>

        <?php endif; ?>


    <?php else : ?>
        <h1>Pas d'articles</h1>
    <?php endif; ?>

</main>

<?php get_footer() ?>