<?php

get_header(); ?>
    <!-- site-content -->
    <div class="site-content clearfix">

        <!-- main-column -->
        <div class="main-column">
            <?php if (have_posts() ) : ?>

              <h2>Search results for: <?php echo the_search_query(); ?></h2>

              <?php
                while ( have_posts() ) : the_post();

                    get_template_part('content', get_post_format);

                  endwhile;

                else :
                    echo '<p>No content found</p>';

                endif;
                ?>

        </div>

        <?php get_sidebar(); ?>

    </div>
get_footer();

?>
