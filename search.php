<?php
get_header();
get_sidebar(); ?>

<div class="l-site-content search archive">

	<article class="l-page-content">

		<header class="article-header">

				<h1 class="article-title title">Recherche</h1>

		</header>

		<section class="article-content">

			<div class="search-form-wrap"><?php get_search_form(); ?></div>

			<?php if ( have_posts() ) : ?>
		<!-- s'il y a des résultats -->
			<h2 class="search-result-description"><?php printf( __( 'Résulats pour : %s' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
		<!-- s'il y a pas de résultats -->
			<?php else : ?>
			<p class="search-result-description"><?php _e( 'Aucun résultat' ); ?></p>
			<?php endif; ?>

		</section>

	</article>

	<?php if ( have_posts() ) : ?>
<!-- s'il y a des résultats -->
	<section class="search-results extrait__list">
		
	<?php get_template_part('loop'); ?>

	</section>
	<?php endif; ?>

	
	<section class="l-grid search-suggestions">

	<?php $terms = get_terms( 'thematique', 'hide_empty=0' ); ?>
	<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) : ?>
<!-- On affiche les THEMATIQUES s'il y en a -->
		<section class="l-grid-item_1-3">
			<h2>Thématiques</h2>
			<ul>
			<?php
			$term_list = '';
			foreach ( $terms as $term ) {
				$term_list .= '<li><a href="' . esc_url( get_term_link( $term ) ) . '">' . $term->name . '</a></li>';
			}
			echo $term_list;
			?>
			</ul>
		</section>
	<?php endif; ?>

	<?php $terms = get_terms( 'Auteurs', 'hide_empty=0' ); ?>
	<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) : ?>
<!-- On affiche les AUTEURS s'il y en a -->
		<section class="l-grid-item_1-3">
			<h2>Auteurs</h2>
			<ul>
			<?php
			$term_list = '';
			foreach ( $terms as $term ) {
				$term_list .= '<li><a href="' . esc_url( get_term_link( $term ) ) . '">' . $term->name . '</a></li>';
			}
			echo $term_list;
			?>
			</ul>
		</section>
	<?php endif; ?>

	<?php 
	// the query
	$query_args = array(
		'post_type' => 'ouvrage',
		'orderby' => 'title'
	);
	$the_query = new WP_Query( $query_args ); ?>

	<?php if ( $the_query->have_posts() ) : ?>
<!-- On affiche les OUVRAGES s'il y en a -->

		<section class="l-grid-item_1-3">
			<h2>Ouvrages</h2>
			<ul>
			<!-- the loop -->
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<li><a href=""><?php the_title(); ?></a></li>
			<?php endwhile; ?>
			<!-- end of the loop -->
			</ul>
		</section>

		<?php wp_reset_postdata(); ?>

	<?php endif; ?>
		
	</section>

<?php get_footer(); ?>