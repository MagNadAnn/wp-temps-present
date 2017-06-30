<?php if (have_posts()) : ?>

	<div class="l-page-content">

<?php while (have_posts()) : the_post();

	$cats = array();
	foreach (get_the_category($post_id) as $c) {
		$cat = get_category($c);
		array_push($cats, $cat->name);
	}
	$post_categories = implode(', ', $cats);

?>

		<article class="extrait__item">
			<div class="extrait__img"><?php the_post_thumbnail('medium'); ?></div>
			<div class="extrait__text">
				<p class="article-date"><?php the_date(); ?></p>
				<h2 class="title-2"><?php echo $post_categories; ?> - <?php the_title(); ?></h2>
				<section>
					<?php the_excerpt(); ?>
				</section>
				<p><a href="<?php the_permalink() ?>">Lire la suite</a></p>
			</div>
		</article>

<?php endwhile; ?>

</div>

<?php endif; ?>