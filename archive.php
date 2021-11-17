<?php get_header(); ?>

<div class="content-archive">
  <div class="container">
  <?php
  if (have_posts()) : while (have_posts()) : the_post();
   ?>
    <dl class="anno clearfix">
      <dt class="anno_title">
      	<a class="anno_title-link" href="<?php echo the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          
						<?php the_title() ?>
          </a>
        </dt>
      <dd class="anno_img">
      	<a href="<?php echo the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
					<?php
	              if ( has_post_thumbnail() ) 
	                the_post_thumbnail( );
// Если нет post thumbnail ставится стандартная картинка
                  else
                    echo '<img src="' . trailingslashit( get_stylesheet_directory_uri() ) . 'img/rsz_1_12-min.jpg' . '" alt="" />';
	              
	            ?>
      	</a>
      </dd>
      <dd class="anno_meta"> 
        <?php 
          the_time('d/m/Y');
        ?>
      </dd>
      <dd class="anno_excerpt"> 
        <?php the_excerpt() ?> <a href="<?php echo the_permalink() ?>">Читать новость...</a>
      </dd>
    </dl>
      <?php
          endwhile; ?>

          <nav class="anno_nav clearfix">
            <div class="anno_nav-prev">
              <?php next_posts_link('Предыдущие записи'); ?>
            </div>
            <div class="anno_nav-next">
              <?php previous_posts_link('Новые записи'); ?>
            </div>
          </nav>

        <?php else : ?>
          <h1>Извините...</h1>
          <p>
            <?php _e('Извините, нет записей удовлетворяющих критериям вашего поиска.'); ?>
          </p>
         <?php
        endif;
          ?>
  </div>
</div>

<?php get_footer(); ?>