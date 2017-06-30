<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post();

	$cats = array();
	foreach (get_the_category($post_id) as $c) {
		$cat = get_category($c);
		array_push($cats, $cat->name);
	}
	$post_categories = implode(', ', $cats);

?>

		<article class="article-apercu_large">
			<div class="article-apercu__img">
				<a href="<?php the_permalink() ?>">
					<img class="img-object thumbnail book" src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
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