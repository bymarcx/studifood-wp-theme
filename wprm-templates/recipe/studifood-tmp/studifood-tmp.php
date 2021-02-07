<!-- <div class="wprm-container-float-left">
    [wprm-recipe-image default="1920x1080"]
</div> -->

<!-- Video is now included in theme itself-->
<!--[wprm-recipe-video size="1920x1080"]-->


<div class="container">
    <div class="row">
        <div class="col-12">
            <!-- Einleitungstext not using this anymore -->
            <!-- [wprm-recipe-notes] -->
            <h2 data-aos="fade-right">Was wird gebraucht?</h2>
        </div>
        <div class="col-12 col-md-4">
            <h3 data-aos="fade-right">Zutaten</h3>
            [wprm-recipe-servings label_container="1" label="Portionen" label_style="bold" style="inline" label_separator=": " adjustable="text-buttons"]


            <?php
            $ingredients = $recipe->ingredients();
            if (count($ingredients) > 0) : ?>
                <div class="wprm-recipe-ingredients-container " data-aos="fade-up">
                    <?php foreach ($ingredients as $ingredient_group) : ?>
                        <div class="wprm-recipe-ingredient-group">
                            <?php if ($ingredient_group['name']) : ?>
                                <h4 class="wprm-recipe-group-name wprm-recipe-ingredient-group-name"><?php echo $ingredient_group['name']; ?></h4>
                            <?php endif; // Ingredient group name. 
                            ?>
                            <ul class="wprm-recipe-ingredients">
                                <?php foreach ($ingredient_group['ingredients'] as $ingredient) : ?>
                                    <li class="wprm-recipe-ingredient">
                                        <div class="notes">
                                            <span class="wprm-recipe-ingredient-name"><?php echo WPRM_Template_Helper::ingredient_name($ingredient, true); ?></span>
                                            <?php if ($ingredient['notes']) : ?>
                                                <span class="wprm-recipe-ingredient-notes"><?php echo $ingredient['notes']; ?></span>
                                            <?php endif; // Ingredient notes. 
                                            ?>
                                        </div>
                                        <div class="amount">
                                            <?php if ($ingredient['amount']) : ?>
                                                <span class="wprm-recipe-ingredient-amount"><?php echo $ingredient['amount']; ?></span>
                                            <?php endif; // Ingredient amount. 
                                            ?>
                                            <?php if ($ingredient['unit']) : ?>
                                                <span class="wprm-recipe-ingredient-unit"><?php echo $ingredient['unit']; ?></span>
                                            <?php endif; // Ingredient unit. 
                                            ?>
                                        </div>
                                    </li>
                                <?php endforeach; // Ingredients. 
                                ?>
                            </ul>
                        </div>
                    <?php endforeach; // Ingredient groups. 
                    ?>
                    <?php echo WPRM_Template_Helper::unit_conversion($recipe); ?>
                </div>
            <?php endif; // Ingredients. 
            ?>


        </div>
        <div class="col-12 col-md-4">
            <h3 data-aos="fade-right" data-aos-delay="200">Utensilien</h3>
            <div data-aos="fade-up" data-aos-delay="200">
                [wprm-recipe-equipment]
            </div>

        </div>
        <div class="col-12 col-md-4" data-aos="fade-up">

            <div class="recipe-facts" data-aos="fade-up" data-aos-delay="400">

                <div class="recipe-fact">
                    <div class="recipe-fact-circle">
                        <?php
                        $taxonomy_names = wp_get_object_terms(get_the_ID(), 'mahlzeit',  array("fields" => "names"));
                        if (!empty($taxonomy_names)) :
                            foreach ($taxonomy_names as $tax_name) : ?>
                                <p><span class="mahlzeit-ico"></span><?php echo $tax_name; ?> </p>
                        <?php endforeach;
                        endif;
                        ?>
                    </div>
                    <div class="recipe-fact-notes">
                        Mahlzeit
                    </div>

                </div>

                <div class="recipe-fact">
                    <div class="recipe-fact-circle">
                        <?php
                        $taxonomy_names = wp_get_object_terms(get_the_ID(), 'aufwand',  array("fields" => "names"));
                        if (!empty($taxonomy_names)) :
                            ?>
                            <span class="aufwand-ico"></span>
                            <?php
                            foreach ($taxonomy_names as $tax_name) : ?>
                                <p><?php echo $tax_name; ?>  </p>
                        <?php endforeach;
                        endif;
                        ?>
                    </div>
                    <div class="recipe-fact-notes">
                    Aufwand
                    </div>

                </div>

                <div class="recipe-fact">
                    <div class="recipe-fact-circle">
                        <?php
                        if ($recipe->total_time()) : ?>
                            <div class="wprm-recipe-meta-container wprm-color-accent2 wprm-recipe-total-time-container">
                                <span class="wprm-recipe-details-name wprm-recipe-total-time-name timer-ico"> <?php echo $recipe->total_time_formatted(); ?></span>
                            </div>
                        <?php endif; // Total time. 
                        ?>

                    </div>
                    <div class="recipe-fact-notes">
                        Dauer
                    </div>

                </div>

                <div class="recipe-fact">
                <div class="recipe-fact-circle">
                    [wprm-recipe-rating display="stars"]
                </div>
                <div class="recipe-fact-notes">
                    Bewertung
                </div>

            </div> 
            </div>
            <div class="recipe-fact-notes">
            
            </div>
            

        </div>
        <div class="col-12">
            <h2 data-aos="fade-right">So wird es zubereitet!</h2>
            <p data-aos="fade-up">[wprm-recipe-servings label_container="4" label="Portionen" label_separator=": " adjustable="no"]</p>
            <div data-aos="fade-up">
                [wprm-recipe-instructions text_margin="5px" image_size="medium"]
            </div>
            [wprm-recipe-print icon="printer" text="Print"]

            <!-- [wprm-recipe-add-to-collection icon="contact" icon_added="contact"]
            [wprm-spacer size="5px"]

            [wprm-spacer size="5px"]

            [wprm-nutrition-label style="simple" header="Nutrition"]
            [wprm-recipe-nutrition label_container="1" field="calories" unit="1" label="Calories" label_style="bold"
            style="columns"] -->
        </div>
    </div>
</div>