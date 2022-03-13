<?php get_header() ?>

<?php
$args = array(
    'post_type' => 'gallery',
    'order'    => 'ASC'
);

$the_query = new WP_Query($args);

if (have_posts()) : ?>
    <div >
        <?php while (have_posts()) : the_post();
            if (has_post_thumbnail()) :
                $thumbnailBgImg = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium'); ?>

                <div class="post" onclick="openModal('<?php echo $thumbnailBgImg[0] ?>', '<?php the_title(); ?>', '<?php echo $post->ID ?>', '<?php echo the_content() ?>')">
                    <div class="post-thumbnail" id="post-thumbnail" style="background-image: url(' <?php echo $thumbnailBgImg[0]; ?> ');"></div>
                    <div class="post-content">
                        <h3 id="thumbnail-h3"><?php the_title(); ?></h3>
                        <p id="thumbnail-p"><?php the_content(); ?></p>
                    </div>
                </div>
                <!-- MODAL SECTION -->
                <div id="myModal" class="modal">
                    <span class="close">&times;</span>
                    <div class="modal-box">
                        <img class="modal-content" id="modal-img">
                    </div>
                    <div id="caption">
                        <div class="caption-text">
                            <h3></h3>
                            <p></p>
                        </div>
                        <a></a>
                    </div>
            <?php endif;
        endwhile ?>

                </div>
            <?php else : ?>
                <h1>Pas d'articles</h1>
            <?php endif; ?>


            <?php get_footer() ?>