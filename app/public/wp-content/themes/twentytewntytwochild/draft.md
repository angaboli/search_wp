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