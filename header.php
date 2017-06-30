<!DOCTYPE html>
<html>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title>
    <?php
      if (is_home()) {
        bloginfo('name');
      } else if (is_tag()) {
        single_tag_title();
      } else if (is_category()) {
        single_cat_title();
      } else if (is_tax()) {
        single_term_title();
      } else {
        the_title();
      }
    ?>
    </title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:400,600" rel="stylesheet"> 
    <?php wp_head(); ?>
  </head>
  <body>
  	<div class="l-site">
		<nav class="l-nav site-nav">
			<header class="l-nav-essential site-header">
        <?php if (is_home()) : ?>
  				<h1 class="site-logo"><a href="<?php echo site_url(); ?>" title="Retourner à la page d'accueil"><?php bloginfo('name'); ?></a></h1>
        <?php else : ?>
          <div class="site-logo"><a href="<?php echo site_url(); ?>" title="Retourner à la page d'accueil"><?php bloginfo('name'); ?></a></div>
        <?php endif; ?>
				<button class="l-nav-panel-trigger site-menu-trigger btn">≡</button>
			</header>