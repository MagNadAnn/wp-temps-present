<?php
get_header();
get_sidebar(); ?>

<div class="l-site-content single">

<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>

<?php
	$post_type = get_post_type();
	$terms = get_terms( 'thematique' );
?>

<article class="l-page-content l-page-content__sheet"> <!-- basic(?), sheet, grid -->
	<div class="l-article-core">
		<header class="article-header">
			<h1 class="article-title"><?php the_title(); ?></h1>

			<?php if ( $post_type === 'ouvrage' && ! empty( $terms ) ) : ?>
		<!-- si c'est un ouvrage, et si il y a des thématiques, on affiche :
			les thématiques
			-->
			<p><?php the_terms( $post->ID, 'thematique', 'Thématiques : ' ); ?></p>
			<?php endif; ?>

		</header>
		<section class="article-content">
			<?php the_content(); ?>
		</section>
		
		<?php
		if ( $post_type === 'ouvrage' ) :
		get_template_part('loop-extrait');
		endif;
		?>

	</div>
	<aside class="l-article-contextual ">
		<?php the_post_thumbnail('medium'); ?>
		<dl class="attached-info__list">
			
			<?php if ( $post_type === 'post' ) : ?>
		<!-- si c'est une actu on affiche :
			la date,
			la catégorie
			-->
			<dt class="attached-info__item_title">Date</dt>
			<dl class="attached-info__item_info"><?php the_date(); ?></dl>
			<dt class="attached-info__item_title">Catégorie</dt>
			<dl class="attached-info__item_info"><?php the_category(', '); ?></dl>

			<!--  et si en plus c'est un extrait on affiche :
				l'ouvrage lié
				-->
				<?php $ouvrage_lie = get_field('ouvrage_lie'); ?>
				<?php if( $ouvrage_lie ): ?>
					<?php foreach( $ouvrage_lie as $ouvrage_lie ): ?>
							<a class="article-basics" href="<?php echo get_permalink( $ouvrage_lie->ID ); ?>">
								<?php echo get_the_post_thumbnail( $ouvrage_lie->ID, 'thumbnail'); ?>
								<span class="article-basics__title"><?php echo get_the_title( $ouvrage_lie->ID ); ?></span>
							</a>
					<?php endforeach; ?>
				<?php endif; ?>

			<?php endif; ?>

			<?php if ( $post_type === 'ouvrage' ) : ?>
		<!-- si c'est un ouvrage on affiche :
			l'auteur,
			la date de parution,
			la collection,
			le prix,
			la disponibilité'
			-->
			<dl class="attached-info__list">
			<dt class="attached-info__item_title">Auteur</dt>
			<dd class="attached-info__item_info"><?php the_terms( $post->ID, 'Auteurs'); ?></dl>
			<dt class="attached-info__item_title">Date de parution</dt>
			<dd class="attached-info__item_info"><?php the_date(); ?></dl>
			<dt class="attached-info__item_title">Collection</dt>
			<dd class="attached-info__item_info"><?php the_terms( $post->ID, 'Collections'); ?></dl>
			<dt class="attached-info__item_title">Prix</dt>
			<dd class="attached-info__item_info"><?php the_field('prix'); ?></dl>
			<dd class="attached-info__item_info"><?php the_field('disponibilite'); ?></dl>
			<?php endif; ?>

		</dl>
	</aside>
</article>

<?php endwhile;

endif;

get_footer();
?>