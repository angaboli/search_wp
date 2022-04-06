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
                    <?php

                    $term = get_queried_object();
                    $cp = get_the_ID();
                    $custom_taxo = get_object_taxonomies($cp);
                    if($custom_taxo) :
                        foreach ($custom_taxo as $tax) {
                            # code...
                            $list = wp_list_categories(array(
                                'orderby'  => 'name',
                                'taxonomy' => $tax,
                                'parent'   => $term->term_id,
                                'title_li' => '',
                                'depth'    => 1,
                                'echo'     => false,
                            ));
                            //dump($list);
                            if ($list) {
                                echo "<ul>$list</ul>";
                            }else{
                                $term;
                            }
                        }
                endif;

                    ?>
                    <!-- required hidden field for admin-ajax.php -->
                    <input type="hidden" name="action" value="ccavisfilter" />
                </form>
            </div>
        </header>