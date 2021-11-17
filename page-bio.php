<?php
/* Template Name: Bio */
?>

<?php get_header(); ?>
<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
<article class="content-bio">
	<div class="container">
		<h1 class="bio_title">
			<?php the_title(); ?>
		</h1>
		<div class="bio_img align-right">
			<?php
										if ( has_post_thumbnail() ) {
											the_post_thumbnail(array(500,1000));
										}
									?>
		</div>
		<?php the_content();
				 ?>
	</div>
</article>
<?php
				endwhile;
				endif;
	?>
<?php get_footer(); ?>