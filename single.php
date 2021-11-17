<?php get_header(); ?>
<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
<article class="content-single">
  <div class="container">
    <h1 class="post_title">
      <?php the_title(); ?>
    </h1>
    <p class="post_meta">
      <?php the_time('d/m/Y'); ?>
    </p>

    <?php
      if (has_post_thumbnail()) {
        the_post_thumbnail();
      }
     ?>

    <?php the_content(); ?>
  </div>
</article>
<?php
        endwhile;
        endif;
  ?>
<?php get_footer(); ?>