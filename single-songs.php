<?php get_header(); ?>
<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
<article class="content-song">
      <div class="container clearfix">
      <!-- Фича для того, чтобы post thumbnail сделать фоновым изображением -->
        <?php
        global $post; ?>
        <?php
        $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 1280,853 ), false, '' );
        ?>
        <?php
        if (!empty($src)) { ?>
        <header class="song_header" style="background: linear-gradient(rgba(0,0,0,.6), rgba(0,0,0,.6)), url(<?php echo $src[0]; ?> ) top / cover no-repeat;">
        <?php } else { ?>
          <header class="song_header"> 
          <?php } ?>
          <h1 class="song_title">
            <?php the_title(); ?>
          </h1>
          <!-- Берем данные из custom fields -->
          <ul class="song_info">
            <li class="song_info-item">Музыка: <?php echo get_post_meta($post->ID, 'author_music', true); ?></li>
            <li class="song_info-item">Слова: <?php echo get_post_meta($post->ID, 'author_lyrics', true); ?></li>
            
            <li class="song_info-item">Альбом: <?php echo get_post_meta($post->ID, 'album_title', true); ?></li>
          </ul>
          <div class="song_button-wrapper">
          <!-- Проверка заполнено ли поле, если нет, то не отображается -->
          <?php $button_check = get_post_meta($post->ID, 'itunes_link', true);
          if (!empty($button_check)) { ?>
          <a class="song_button" href="<?php echo get_post_meta($post->ID, 'itunes_link', true); ?>" ><i class="fa fa-apple"> </i>&nbsp;Купить в iTunes</a>
          <?php } else {} ?>
          </div>
        </header>
        <section class="song_section">
          <?php the_content();
         ?>
         <?php $history_check = get_post_meta($post->ID, 'song_history', true);
         if (!empty($history_check)) { ?>
          <h2 class="song_section-title">История создания</h2>
          <p class="song_section-text">
          <?php echo get_post_meta($post->ID, 'song_history', true); ?>
          </p>
          <?php } else {} ?>
          <?php $lyrics_check = get_post_meta($post->ID, 'song_lyrics', true);
         if (!empty($lyrics_check)) { ?>
          <h2 class="song_section-title">Текст песни</h2>
          <p class="song_section-text">
            <?php echo get_post_meta($post->ID, 'song_lyrics', true); ?>
          </p>
          <?php } else {} ?>
        </section>
        <aside class="song_sidebar">
          <?php $mixtape_check = get_post_meta($post->ID, 'song_mixtape', true);
         if (!empty($mixtape_check)) { ?>
          <h3 class="song_sidebar-title">Включена в сборники</h3>
          <p class="song_sidebar-text">
            <a href="<?php echo get_post_meta($post->ID, 'song_mixtapelink', true); ?>">
              <?php echo get_post_meta($post->ID, 'song_mixtape', true); ?>
            </a>

          </p>
        <?php } else {} ?> 
        <?php $review_check = get_post_meta($post->ID, 'song_review', true);
         if (!empty($review_check)) { ?>
          <h3 class="song_sidebar-title">Упоминания в прессе</h3><a class="song_sidebar-link" href="<?php echo get_post_meta($post->ID, 'song_reviewlink', true); ?>" ><?php echo get_post_meta($post->ID, 'song_review', true); ?></a>
          <?php } else {} ?> 
          <?php $related_check = get_post_meta($post->ID, 'song_related', true);
         if (!empty($related_check)) { ?>
          <h3 class="song_sidebar-title">Другие песни с этого альбома</h3>
          <p>
            <?php echo get_post_meta($post->ID, 'song_related', true); ?>
          </p>

          <?php } else {} ?>

          <?php $otherinfo_check = get_post_meta($post->ID, 'song_otherinfo', true);
         if (!empty($otherinfo_check)) { ?>
              <p class="song_sidebar-text">
                  <?php echo get_post_meta($post->ID, 'song_otherinfo', true); ?>
              </p>
          <?php } else {} ?>
        </aside>
        
      </div>
    </article>
  <?php
        endwhile;
        endif;
  ?>
<?php get_footer(); ?>