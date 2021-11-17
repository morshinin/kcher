<?php
/* Template Name: Schedule */
?>

<?php get_header(); ?>

<div class="content-schedule">
      <div class="container">

        <table class="table-schedule">
          <caption class="table-schedule_caption">Афиша</caption>
          <thead class="table-schedule_head">
<!--             <tr>
  <th>Дата</th>
  <th>Город</th>
  <th>Место</th>
  <th>Мероприятие</th>
  <th>Подробнее</th>
</tr> -->
          </thead>
          <tbody class="table-schedule_body">
      <?php
      	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
        	'post_type' => 'events',
        	'posts_per_page' => 4,
        	'paged' => $paged);
        $events = new WP_Query($args);
          if ($events->have_posts() ) : while ( $events->have_posts() ) : $events->the_post();
         ?>
            <tr>
            <!-- Забираем данные custom fields -->
              <td>
                <?php echo get_post_meta($post->ID, 'event_date', true); ?>
              </td>
              <td>
                <?php echo get_post_meta($post->ID, 'event_city', true); ?>
              </td>
              <td>
                <?php echo get_post_meta($post->ID, 'event_place', true); ?>
              </td>
              <td>
                <?php echo get_post_meta($post->ID, 'event_title', true); ?>
              </td>
              <td>
                <a class="table-schedule_link" href="<?php echo the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                  Узнать больше
                </a>
              </td>
            </tr>
          
        <?php
                  endwhile; ?>
          </tbody>
        </table>

                  <?php if ($events->max_num_pages > 1) { ?>
                  	<nav class="prev-next-posts clearfix">
                  		<div class="prev-posts-link">
                  <?php echo get_next_posts_link('Предыдущие мероприятия', $events->max_num_pages); ?>
                  </div>
                  <div class="next-posts-link">
                  <?php echo get_previous_posts_link('Новые мероприятия'); ?>
                  </div>
                  </nav>

                  <?php } ?>

              <?php else: ?>
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