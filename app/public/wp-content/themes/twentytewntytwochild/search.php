<?php

/**
 * Template Name:  Search page
 */
?>


<?php get_header() ?>

<main class="main">

    <?php
    $s = get_search_query();
    $args = array(
        's' => $s
    );
    // The Query
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {
        _e("<h3 > " . get_query_var('s') . "</h3>");
        _e("<p>" . $the_query->found_posts() . "</p>");

        while ($the_query->have_posts()) {
            $the_query->the_post();

            get_template_part('parts/card');
        }
    } else {
    ?>
        <div class="alert-info">
            <h2>Rien n'as été trouvé.</h2>
            <p>Désolé, l'element que vouz cherchez n'existe pas. Essayer avec un autre mot-clé.</p>
        </div>
    <?php } ?>
</main>
<?php get_footer() ?>