<?php get_header(); ?>
<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
<article class="content-page">
      <div class="container">

        <?php
          if (has_post_thumbnail()) {
            the_post_thumbnail();
          }
         ?>
        <?php the_content();
         ?>

          <?php
                  endwhile;
                endif;
                  ?>
      </div>
    </article>
<?php get_footer(); ?>