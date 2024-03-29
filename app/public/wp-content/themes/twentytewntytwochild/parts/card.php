<div class="card">

    <div class="post">
        <a href="#modal" class="js-modal" data-url='<?php the_post_thumbnail_url('modal')?> '>

            <?php the_post_thumbnail('card-header') ?>
            <h3><?php the_title();  ?></h3>
            <span class="text-single"><?= get_the_term_list($post->ID, 'categorie', '#', ', ') ?></span> 
            <span class="text-single"><?= get_the_term_list($post->ID, 'etiquette', '#', ', ') ?></span> 
            <?php // $img = the_post_thumbnail_url(); dump($img); ?>
        </a>
    </div>

    <!-- MODAL SECTION -->
    <div id="myModal" class="modal" style="display: none;" aria-hidden="true" role="dialog" aria-modal="false" aria-labelledby="title-modal">
        <div class="modal-wrapper js-modal-stop">
            <span class="js-modal-close">&times;</span>

            <div class="modal-box">
                <img src="<?= the_post_thumbnail_url('modal') ?>" class="img">
            </div>
            <div class="caption-text">
                <h3 id="title-modal"><?php the_title();  ?></h3>
                <span class="text-single"><?= get_the_term_list($post->ID, 'etiquette', '', ', ') ?></span>
            </div>
        </div>
    </div>
</div>