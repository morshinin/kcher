<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(' - ',TRUE,'right'); bloginfo('name'); ?></title>
    <meta name="viewport" content="width=device-width">
    <meta name="yandex-verification" content="872198a4150720a6" />

    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <!-- header.jade-->
    <header class="header clearfix">
      <div class="container">
        <h2 class="header_logo">
          <?php
          if(get_theme_mod('kcher_logo')) :
          ?>
          <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
          Ксения <span>Чер</span>
          </a>
                <?php else : ?>
                <?php
                       bloginfo('name');
                       ?>
                       <?php endif; ?>
          </h2>
        <nav class="header_nav">
          <?php
          wp_nav_menu( array(
            'theme_location' => 'primary',
            'items_wrap' => '<ul>%3$s</ul>'));
          ?>
        </nav>
      </div>
    </header>