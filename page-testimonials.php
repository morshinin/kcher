<?php
/* Template Name: Testimonials*/
 ?>

<?php get_header(); ?>
<div class="content-comments">
      <div class="container clearfix">
      <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
  
      	 <?php the_content();
      	  ?>
      	  <?php if (comments_open() || get_comments_number()) : comments_template();
      	endif; ?>
      	<?php
        endwhile;
        endif;
  ?>
      </div>
    </div>
<?php get_footer(); ?>