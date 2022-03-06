<?php get_header() ?>

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

?>

        <div class="card">
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </li>
        </div>
    <?php
    }
} else {
    ?>
    <div class="alert-info">
        <h2>Rien n'as été trouvé.</h2>
        <p>Désolé, l'element que vouz cherchez n'existe pas. Essayer avec un autre mot-clé.</p>
    </div>
<?php } ?>
<?php get_footer() ?>