<?php
get_header();
get_sidebar(); ?>

<div class="l-site-content page">

<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>

<article class="l-page-content"> <!-- basic(?), sheet, grid -->
	<header class="article-header">
		<h1 class="article-title title">Erreur 404</h1>
	</header>
	<section class="article-content">
		<div>
			<p>La page demandée n'existe plus.</p>
			<p>Nous vous en demandons pardon et vous proposons d'utiliser le champ de recherche pour parvenir jusqu'au contenu que désirez consulter.</p>
			<p>Bonne visite sur notre site !</p>
		</div>
	</section>
</article>

<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>