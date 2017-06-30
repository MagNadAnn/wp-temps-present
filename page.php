<?php
get_header();
get_sidebar(); ?>

<div class="l-site-content page">

<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>

<article class="l-page-content"> <!-- basic(?), sheet, grid -->
	<header class="article-header">
		<h1 class="article-title title"><?php the_title(); ?></h1>
	</header>
	<section class="article-content">
		<?php the_content(); ?>
	</section>
</article>

<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>