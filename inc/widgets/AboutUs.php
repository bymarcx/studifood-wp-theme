<?php

class AboutUsWidget extends WP_Widget
{

    function __construct()
    {
        $widget_ops = array(
            'description' => 'Headline und Text sowie Image :: Über uns',
        );
        parent::__construct(false, '1_StudiFood :: About us', $widget_ops );

    }

    function widget($args, $instance)
    {
        // Widget output

        extract($args);
        $title = $instance['title'];
        $text = $instance['text'];
        $image_uri = $instance['image_uri'];

        echo $before_widget;
        
        echo("<div class=\"container\"> ");
        echo("<div class=\"row\"> ");

        echo("<div class=\"col-12 col-md-6\">");

        echo("<h2 data-aos=\"fade-right\">" . $title . "</h2>");

        echo("<p data-aos=\"fade-up\">" . $text . "</p>");

        echo("</div><div class=\"col-12 col-md-6\">");

        echo("<img data-aos=\"fade-left\" data-aos-easing=\"ease-in-sine\" data-aos-duration=\"800\" src= " . esc_url ($instance['image_uri'] ) . " />");

        echo("</div>");

        echo("</div></div>");

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

        $instance['image_uri'] = strip_tags( $new_instance['image_uri'] );


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
        $image_uri = $instance['image_uri'];

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php echo 'Titel'; ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>

        
        <p>
        <label for="<?php echo $this->get_field_id('image_uri'); ?>">Image</label><br />
       
        <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php echo $instance['image_uri']; ?>">
        <input type="button" style="margin:10px 0;" value="<?php _e( 'Upload Image', 'theme name' ); ?>" class="button custom_media_upload" id="custom_image_uploader"/>
        <img class="custom_media_image" src="<?php if(!empty($instance['image_uri'])){echo $instance['image_uri'];} ?>" style="margin:10px 0;padding:0;max-width:100px;display:block" />
    </p>

        <label for="<?php echo $this->get_field_id('text'); ?>"><?php echo 'Text'; ?></label>
        <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>

        <?php


    }
}

