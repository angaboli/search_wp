
    <?php get_header( ) ?>

    <?php
            $args = array(
                'post_type' => 'gallery',
                'order'    => 'ASC'
            );

            $the_query = new WP_Query($args);

     if (have_posts()): ?>
        <ul>
            <?php while(have_posts()): the_post();  ?>
                <?php the_post_thumbnail('card-header') ?>
                <h3><?php the_title();  ?></h3>
                <p><?php the_excerpt() ?></p>
                <a href="<?php the_permalink(); ?>">Lire la suite ... </a>
                <?php
                ?>
            <?php endwhile ?> 

        </ul>
    <?php else: ?>
        <h1>Pas d'articles</h1>
    <?php endif; ?>


    <?php get_footer( ) ?>

