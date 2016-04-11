<?php

get_header();

if (have_posts() ) :
    while ( have_posts() ) : the_post();
    if (get_post_format() == false) {
      get_template_part("content", "single");
   } else {
         get_template_part("content", get_post_format());
   }

    endwhile;

    else :
      echo '<p>No content found</p>';

   endif;
   
get_footer();

?>
