<form action="/" method="POST">
    <label for="search">Search in <?php echo home_url( '/' ); ?></label>
    <input type="text" name="s" id="search" placeholder="Live Show, collection, lingerie, ..." value="<?php the_search_query(); ?>" />
    <input type="image" alt="Search" src="<?php bloginfo( 'template_url' ); ?>/images/search.png" />
</form>