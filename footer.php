	<footer class="footer clearfix">
	  <div class="container">
	  
	    <div class="footer_social clearfix">
				<?php if (is_active_sidebar('social')) : ?>

	      <?php dynamic_sidebar('social'); ?>

	    	<?php else : ?>

	    <a href="#" class="footer_social-link"><i class="fa fa-vk"></i></a><a href="#" class="footer_social-link"><i class="fa fa-facebook"></i></a><a href="#" class="footer_social-link"><i class="fa fa-odnoklassniki"></i></a><a href="#" class="footer_social-link"><i class="fa fa-at"></i></a>
			<?php endif; ?>
	    </div>
	    <div class="footer_copyright"><small>Все права защищены &copy; <?php the_date('Y'); ?></small></div>
	  </div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>