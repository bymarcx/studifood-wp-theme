<?php

class FeaturedRecipesWidget extends WP_Widget
{

    function __construct()
    {
        $widget_ops = array(
            'description' => 'Headline und Text / Zeigt zwei Zufällige Rezepte an',
        );
        parent::__construct(false, '1_StudiFood :: Featured Recipes', $widget_ops );

    }

    function widget($args, $instance)
    {
        // Widget output

        extract($args);
        $title = $instance['title'];
        $text = $instance['text'];

        echo $before_widget;

        echo("<div class=\"container\" >");
        
            echo("<div class=\"row\">");

                echo("<div class=\"col-12 offset-xl-1 col-xl-10\">");

                    echo("<div class=\"row\">");

                        echo("<div class=\"col-12 headline-box\" data-aos=\"fade-right\" ><div class=\"headline-box-inner\">");

                            echo("<h2>" . $title . "</h2>");
                            echo("<p>" . $text . "</p>");

                        echo("</div></div>");

                        echo("<div class=\"col-md-0 col-xxl-3\"></div>"); 

                        echo("<div class=\" col-md-12 col-lg-4 col-xxl-3 all-recipes\" data-aos=\"fade-up\"><div class=\"all-recipes-inner\">");
                            echo("<a href=\"./rezepte\" class=\"btn btn-secondary\">Alle Rezepte</a>");
                        echo("</div></div>");



        

        $the_query = new WP_Query(array(
            'post_type' => 'recipes',
            'posts_per_page' => '2',
            'orderby' => 'wprm_rating_average',
            'order' => 'DESC',

        ));

        while ($the_query->have_posts()) : $the_query->the_post();
        
        echo("<div class=\"col-lg-4  col-xxl-3 recipe-card\" data-aos=\"fade-up\">");
        echo("<a href=\"");the_permalink(); echo("\">");     
            // Get the recipes inside the current post.
            $recipes = WPRM_Recipe_Manager::get_recipe_ids_from_post();

            // Access the first recipe, if there is one.
            if ( isset( $recipes[0] ) ) {
                $recipe_id = $recipes[0];
                $recipe = WPRM_Recipe_Manager::get_recipe( $recipe_id );

                // Output the recipe name.
                echo ("<p>" . $recipe->name() . "</p>" );
                echo("<div class=\"img_overlay\"></div>" );
                echo $recipe->image(1920,1080);
            }
        

        echo("</a>");
        echo("</div>");
        
        endwhile;

        echo("</div>");
        echo("</div>");
        echo("</div>");
        echo("</div>");

        echo $after_widget;

    }

    function update($new_instance, $old_instance)
    {
        // Save widget options
        $instance = array();

        if ( current_user_can('unfiltered_html') ) {
            $instance['text'] =  $new_instance['text'];
            $instance['title'] = sanitize_text_field($new_instance['title']);
        }
        else {
            $instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
            $instance['title'] = sanitize_text_field($new_instance['title']);
        }

        return $instance;

    }

    function form($instance)
    {
        // Output admin widget options form

        $defaults = array(
            'title' => 'Meine Projekte',
            'background' => 'false',
        );
        $instance = wp_parse_args((array)$instance, $defaults);

        $title = $instance['title'];
        $text = $instance['text'];
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php echo 'Titel'; ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <label for="<?php echo $this->get_field_id('text'); ?>"><?php echo 'Text'; ?></label>
        <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>

        <?php


    }
}

