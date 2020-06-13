<?php get_header(); ?>

<div class="header">
    <img class="header-img" src="<?php echo get_home_url(); ?>/wp-content/themes/vogelauge-wp-theme/header-bg.jpg" />
    <div class="nav">
        VOGELAUGE

    </div>

    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">

        <a class="navbar-brand" href="#">VOGELAUGE</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>

            </ul>
        </div>
    </nav>


</div>


    <section>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h1><a href="#main" class="page-scroll"><?php the_title(); ?></a></h1>
            <div class="entry">
                <?php the_content(); ?>
            </div>
        <?php endwhile; endif; ?>


        <br><br><br><br><br><br><br><br>

    </section>



<?php get_footer(); ?>