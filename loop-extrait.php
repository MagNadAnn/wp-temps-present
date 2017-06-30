<?php 
// the query
$query_args = array(
	'post_type' => 'post',
	'category_name' => 'extraits',
	'orderby' => 'date',
	'meta_query' => array(
		array(
			'key' => 'ouvrage_lie',
			'value' => '"' . get_the_ID() . '"',
			'compare' => 'LIKE'
			)
		)
);

$the_query = new WP_Query( $query_args ); ?>

<?php if ( $the_query->have_posts() ) : ?>

<section class="article-content">
	<h2 class="title">Extrait(s)</h2>

	<!-- the loop -->
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

	<article>
	<?php the_content(); ?>

	</article>

	<?php endwhile; ?>
	<!-- end of the loop -->

</section>

	<?php wp_reset_postdata(); ?>

<?php endif; ?>