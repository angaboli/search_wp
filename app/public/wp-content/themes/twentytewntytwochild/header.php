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
                <a href="<?= get_post_type_archive_link('portfolio'); ?>">Portfolio</a>

            </div>
            <div class="flex-row">

                <?php
                if ($terms = get_terms(array('taxonomy' => 'categorie', 'hide_empty' => true))) :
                    foreach ($terms as $term) :
                        echo '<input type="radio" id="' . $term->term_id . '" value="' . $term->term_id . '" name="category_avis_filters" class="avis_filters"/><label for="' . $term->term_id . '">' . $term->name . '</label>';
                    endforeach;
                endif;
                ?>
            </div>
            <div class="flex-row">

                <input type="radio" value="all_etiquette" id="all_etiquette" class="avis_filter" name="etiquette_filters"><label for="all_etiquette">Toutes</label>

                <?php
                if ($terms = get_terms(array('taxonomy' => 'etiquette', 'hide_empty' => true))) :
                    foreach ($terms as $term) :
                        echo '<input type="radio" id="' . $term->term_id . '" value="' . $term->term_id . '" name="etiquette_filters" class=avis_filters"/><label for="' . $term->term_id . '">' . $term->name . '</label>';
                    endforeach;
                endif; ?>
            </div>

    
    </header>