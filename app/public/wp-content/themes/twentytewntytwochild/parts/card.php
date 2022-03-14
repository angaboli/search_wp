<div class="card">

    <div class="post">
        <a href="#modal" class="js-modal">

            <?php the_post_thumbnail('card-header') ?>
            <h3><?php the_title();  ?></h3>
        </a>
    </div>

    <!-- MODAL SECTION -->
    <div id="myModal" class="modal" style="display: none;" aria-hidden="true" role="dialog" aria-modal="false" aria-labelledby="title-modal">
        <div class="modal-wraper js-modal-stop">

            <span class="js-modal-close">&times;</span>
            <div class="modal-box">
                <img src="<?= the_post_thumbnail('card-header') ?>" class="modal-content" id="modal-img">
            </div>
            <div class="caption-text">
                <h3><?php the_title();  ?></h3>
                <span class="text-single"><?= get_the_term_list($post->ID, 'tendance', '', ', ') ?></span>
            </div>
        </div>
    </div>
</div>