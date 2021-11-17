<?php get_header(); ?>

	<div class="content">
	  <div class="container">
	    <ul class="bxslider">
	    	<?php
	    	$args = array('post_type' => 'primaryslider', 'posts_per_page' => 3);
	    	$slides = new WP_Query($args);
	    	  if ($slides->have_posts() ) : while ( $slides->have_posts() ) : $slides->the_post();
	    	 ?>
	    	        <li>
	    	          <?php
	    	            if ( has_post_thumbnail() ) {
	    	              the_post_thumbnail();
	    	            }
	    	          ?>
	    	          
	    	        </li>

	    	        <?php
	    	          endwhile;
	    	          ?>

	    	          <?php else : ?>

	      <li><img src="img/rsz_1_12.jpg" alt=""></li>
	      <li><img src="img/17.jpg" alt=""></li>
	      <li><img src="img/16.jpg" alt=""></li>
	    	          	
	    	        <?php
	    	        endif;
	    	          ?>
	    </ul>
	  </div>
	</div>

<?php get_footer(); ?>