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
			<p class="article-thematique"><?php the_terms( $post->ID, 'thematique', 'Thématiques : ' ); ?></p>
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

		<!-- si c'est une actu on affiche : -->
		<?php if ( $post_type === 'post' ) : ?>
			<?php $ouvrage_lie = get_field('ouvrage_lie'); ?>

			<!--  si c'est un extrait on affiche : le thumbnail de l'ouvrage lié -->
			<?php if( $ouvrage_lie ): ?>
				<?php foreach( $ouvrage_lie as $ouvrage_lie ): ?>
					<a class="article-basics" href="<?php echo get_permalink( $ouvrage_lie->ID ); ?>">
						<span class="article-basics__thumbnail">
							<?php echo get_the_post_thumbnail( $ouvrage_lie->ID, 'medium'); ?>
						</span>
						<span class="article-basics__title">
							<?php echo get_the_title( $ouvrage_lie->ID ); ?>
						</span>
					</a>
				<?php endforeach; ?>

			<!--  sinon on affiche le thumbnail du post -->
			<?php else:?>
				<span class="article-basics">
					<span class="article-basics__thumbnail">
						<?php the_post_thumbnail('medium'); ?>
					</span>
				</span>
			<?php endif; ?>

			<!-- et de toute façon, on affiche la date,	la catégorie -->
			<dl class="attached-info__list">
				<dt class="attached-info__item_title">Article publié le</dt>
				<dd class="attached-info__item_info"><?php the_date(); ?></dd>
				<dt class="attached-info__item_title">Catégorie</dt>
				<dd class="attached-info__item_info"><?php the_category(', '); ?></dd>
			</dl>

		<!-- si c'est un ouvrage on affiche : -->
		<?php elseif ( $post_type === 'ouvrage' ) : ?>

			<!--  le thumbnail -->
			<span class="article-basics">
				<span class="article-basics__thumbnail">
					<?php the_post_thumbnail('medium'); ?>
				</span>
			</span>

			<!-- l'auteur, la date de parution, la collection, le prix, la disponibilité' -->
			<dl class="attached-info__list">
				<dt class="attached-info__item_title">Auteur</dt>
				<dd class="attached-info__item_info"><?php the_terms( $post->ID, 'Auteurs'); ?></dd>
				<dt class="attached-info__item_title">Date de parution</dt>
				<dd class="attached-info__item_info"><?php the_date(); ?></dd>
				<dt class="attached-info__item_title">Collection</dt>
				<dd class="attached-info__item_info"><?php the_terms( $post->ID, 'Collections'); ?></dd>
				<dt class="attached-info__item_title">Prix</dt>
				<dd class="attached-info__item_info"><?php the_field('prix'); ?></dd>
				<dd class="attached-info__item_info"><?php the_field('disponibilite'); ?></dd>
			</dl>
		<?php endif; ?>
	</aside>
</article>

<?php endwhile;

endif;

get_footer();
?>