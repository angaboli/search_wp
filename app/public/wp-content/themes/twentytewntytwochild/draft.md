<div class="flex-row">
                        <input type="radio" value="all_categ" id="all_categ" class="avis_filter" name="category_avis_filters"><label for="all_categ">Toutes</label>







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