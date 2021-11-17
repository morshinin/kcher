<?php
  if (post_password_required())
  return;
 ?>

 
   <?php if (have_comments()) : ?>
     <h3 class="comments_title">
       <?php
        printf( _nx('Один отзыв', '%1$s отзывов', get_comments_number(), 'comments title', 'kcher'), number_format_i18n(get_comments_number()), '<span>' . get_the_title() . '</span>');
        ?>
     </h3>
     <ol class="comments_list">
       <?php
          wp_list_comments( array(
            'style' => 'ol',
            'short_ping' => true,
            'avatar_size' => 74,
          ));
        ?>
     </ol>
     <?php
      if (get_comment_pages_count() > 1 && get_option('page_comments')) :
      ?>
      <nav class="comments_navigation" role="navigation">
		<h4 class="screen-reader-text"><?php _e( 'Навигация по отзывам', 'kcher' ); ?></h4>
		<div class="comments_navPrev"><?php previous_comments_link( __( '&larr; Старые отзывы', 'kcher' ) ); ?></div>
		<div class="comments_navNext"><?php next_comments_link( __( 'Новые отзывы &rarr;', 'kcher' ) ); ?></div>
	</nav>
<?php endif; ?>
<?php if ( ! comments_open() && get_comments_number() ) : ?>
  <p>
    <?php _e( 'Отзывы закрыты.', 'kcher'); ?>
  </p>
<?php endif; ?>
<?php endif; // have_comments ?>
<?php
$comments_args = array(
        'class_form' => 'comments',
        'label_submit'=>'Отправить',
        'class_submit' => 'comments_btn',
        'title_reply'=>'Добавить отзыв',
        'comment_field' =>  '<p class="comments-formcomment"><label for="comment">' . _x( 'Ваш отзыв', 'noun' ) .
        '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
        '</textarea></p>',
);

comment_form($comments_args);
 ?>
