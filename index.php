<?php
/**
 * The template for displaying the content.
 *
 * (C) BYMARC
 *
 */
?>

<?php get_header(); ?>

    <!-- HTML content starts! -->

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">

                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( '_customtheme-single-post', array( 'class' => 'single-post-image' ) ); ?>
                        <?php endif; ?>

                        <h1><a href="#main" class=" "><?php the_title(); ?></a></h1>

                        <div class="content">
                            <?php the_content(); ?>
                        </div>
                    <?php endwhile; endif; ?>

                </div>
            </div>
        </div>
    </section>

    <!-- HTML content ends! -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

