<!-- <div class="wprm-container-float-left">
    [wprm-recipe-image default="1920x1080"]
</div> -->

<!-- Video -->
[wprm-recipe-video size="1920x1080"]

<?php get_template_part('template-parts/content/breadcrumb') ?>



<div class="container">
    <div class="row">
        <div class="col-12">
            <!-- Einleitungstext -->
            [wprm-recipe-notes]
            <h2>Was wird gebraucht?</h2>
        </div>
        <div class="col-4">
            <h3>Zutaten</h3>
            [wprm-recipe-servings label_container="1" label="Servings" label_style="bold" style="columns"]

            <?php
            $ingredients = $recipe->ingredients();
            if (count($ingredients) > 0) : ?>
                <div class="wprm-recipe-ingredients-container">
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
        <div class="col-4">
            <h3>Utensilien</h3>
            [wprm-recipe-equipment]

        </div>
        <div class="col-4">
            [wprm-recipe-rating display="stars"]
            [wprm-recipe-cost label_container="1" label="Cost" label_style="bold" style="columns"]

            [wprm-spacer]
            [wprm-recipe-tags-container label_style="bold" style="columns"]
            [wprm-spacer]
            [wprm-recipe-times-container label_style="bold" style="columns"]
            [wprm-spacer]

        </div>
        <div class="col-12">
            <h2>So wird es zubereitet!</h2>
            [wprm-recipe-instructions text_margin="5px" image_size="medium"]

            [wprm-recipe-print icon="printer" text="Print"]



            [wprm-recipe-add-to-collection icon="contact" icon_added="contact"]
            [wprm-spacer size="5px"]

            [wprm-spacer size="5px"]

            [wprm-nutrition-label style="simple" header="Nutrition"]
            [wprm-recipe-nutrition label_container="1" field="calories" unit="1" label="Calories" label_style="bold"
            style="columns"]
        </div>
    </div>
</div>