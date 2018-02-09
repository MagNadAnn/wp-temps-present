<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post();

	$cats = array();
	foreach (get_the_category($post_id) as $c) {
		$cat = get_category($c);
		array_push($cats, $cat->name);
	}
	$post_categories = implode(', ', $cats);

?>
	<?php $ouvrage_lie = get_field('ouvrage_lie'); ?>

		<article class="article-apercu_large">
			<div class="article-apercu__img">
				<a href="<?php the_permalink() ?>">

					<!--  si c'est un extrait, on affiche le thumbnail de l'ouvrage lié -->
					<?php if( $ouvrage_lie ): ?>
						<?php foreach( $ouvrage_lie as $ouvrage_lie ): ?>
							<img class="img-object thumbnail book" src="<?php echo get_the_post_thumbnail_url( $ouvrage_lie->ID , 'medium' ); ?>" alt="<?php the_title(); ?>">
						<?php endforeach; ?>

					<!--  sinon on affiche le thumbnail du post -->
					<?php elseif( has_post_thumbnail() ): ?>
						<img class="img-object thumbnail book" src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
					<?php endif; ?>

				</a>
			</div>
			<div class="article-apercu__text">
				<?php if ( is_category() ) : ?>
				<p class="article-date"><?php the_date(); ?></p>
			<?php endif; ?>
				<h3 class="article-apercu__title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
				<section class="article-apercu__excerpt">
					<?php the_excerpt(); ?>
				</section>
				<p><a href="<?php the_permalink() ?>">Lire la suite</a></p>
			</div>
		</article>

<?php endwhile; ?>

<?php endif; ?>