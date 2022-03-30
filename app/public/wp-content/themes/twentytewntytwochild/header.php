<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head() ?>
</head>

<body>
    <div class="container">
        <header>

            <a href="/">
                <h1>Tagwalk</h1>
            </a>
            <div class="search">
                <?= get_search_form() ?>

            </div>
            <div class="menu">
                <a href="<?= get_post_type_archive_link('gallery'); ?>">Gallery</a>

            </div>
            <div class="flex-row">
                <form action="#" method="POST" id="avis_filters" class="flex-row">
                    <div class="flex-row">
                        <input type="radio" value="all_categ" id="all_categ" class="avis_filter" name="category_avis_filters"><label for="all_categ">Toutes</label>

                        <?php
                        if ($terms = get_terms(array('taxonomy' => 'categorie'))) :
                            foreach ($terms as $term) :
                                echo '<input type="radio" id="' . $term->term_id . '" value="' . $term->term_id . '" name="category_avis_filters" class="avis_filters"/><label for="' . $term->term_id . '">' . $term->name . '</label>';
                            endforeach;
                        endif;
                        ?>
                    </div>
                    <div class="flex-row">

					<input type="radio" value="all_tendance" id="all_tendance" class="avis_filter" name="tendance_filters"><label for="all_tendance">Toutes</label>
					
					<?php 
						if( $terms = get_terms( array( 'taxonomy' => 'tendance' ) ) ) :
							foreach( $terms as $term ) :
								echo '<input type="radio" id="' . $term->term_id . '" value="' . $term->term_id . '" name="tendance_filters" class=avis_filters"/><label for="' . $term->term_id. '">' . $term->name . '</label>';
							endforeach;
						endif;?>
					</div>
					<!-- required hidden field for admin-ajax.php -->
					<input type="hidden" name="action" value="ccavisfilter" />
				</form>
            </div>
        </header>