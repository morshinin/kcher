<?php
/* Template Name: Contact */
 ?>

<?php get_header(); ?>

<article class="content-contact">
  <div class="container clearfix">
    <section class="contact_section">
    <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
      <?php the_content();  ?>
 
  <?php
                  endwhile;
                endif;
                  ?>
    </section>
    <aside class="contact_sidebar">
      <h2 class="form-contact_title">По вопросам сотрудничества</h2>
      <?php 
        $shortcode_value = get_field('contact_sidebar');
        echo do_shortcode($shortcode_value);
       ?>
    </aside>
  </div>
</article>

<?php get_footer(); ?>