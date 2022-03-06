
<?php get_header( ) ?>

<?php if (have_posts()): ?>
    <ul>
        <?php while(have_posts()): the_post();  ?>
            <h2><?php the_title();  ?></h2>
            <p><?php the_content() ?></p>
            <?php
            ?>
        <?php endwhile ?> 

    </ul>
<?php else: ?>
    <h1>Pas d'articles</h1>
<?php endif; ?>


<?php get_footer( ) ?>