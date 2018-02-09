<?php
/*
Template Name: Accueil
*/
?>

<?php
get_header();
get_sidebar(); ?>

<div class="l-home-grid l-site-content home">

<div class="l-home-col-1">

<!--  Dernière parution :  -->
	<?php
	$query_args = array(
		'post_type' => 'ouvrage',
		'showposts' => 1,
		'orderby' => 'date'
	);
	$the_query = new WP_Query( $query_args ); ?>
	<?php if ( $the_query->have_posts() ) : ?>
	<section class="our-widget">
		<h2 class="widget-title">Dernière Parution</h2>
		<!-- the loop -->
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<div class="article-apercu">
			<a href="<?php the_permalink() ?>" title="Lire la suite"><img class="img-object thumbnail book" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"></a>
			<div class="article-apercu__text">
				<section class="article-apercu__excerpt"><?php the_excerpt(); ?></section>
				<p><a class="more" href="<?php the_permalink() ?>" title="Lire la suite">Lire la suite</a></p>
			</div>
		</div>
		<?php endwhile; ?>
		<!-- end of the loop -->
	</section>
	<?php wp_reset_postdata(); ?>
	<?php endif; ?>

</div>

<div class="l-home-col-2">

<!--  Sélection :  -->
	<?php
	$query_args = array(
		'post_type' => 'ouvrage',
		'orderby' => 'date',
		'meta_query' => array(
			array(
				'key' => 'nouveaute',
				'value' => true
				)
			)
	);
	$the_query = new WP_Query( $query_args ); ?>
	<?php if ( $the_query->have_posts() ) : ?>
	<section class="our-widget widget-selection">
		<h2 class="widget-title">Sélection</h2>
		<div class="l-grid book-selection__list">
			<!-- the loop -->
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<a class="l-grid-item_1-2 book-selection__item" href="<?php the_permalink() ?>" title="Lire la suite">
				<img class="img-object thumbnail book" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
			</a>

			<?php endwhile; ?>
			<!-- end of the loop -->
		</div>
	</section>
	<?php wp_reset_postdata(); ?>
	<?php endif; ?>

<!--  Revue :  -->
	<?php
	$query_args = array(
		'post_type' => 'page',
		'pagename' => 'accueil',
	);
	$the_query = new WP_Query( $query_args ); ?>
	<?php if ( $the_query->have_posts() ) : ?>
	<?php
		$mag_couv = get_field('couverture_parvis');
		$mag_link = get_field('lien_parvis');
	?>
		<?php if( $mag_couv && $mag_link ): ?>
		<section class="our-widget">
			<h2 class="widget-title">Revue</h2>
			<a href="<?php echo $mag_link; ?>" title="Découvrir la revue">
				<img class="img-object thumbnail book" src="<?php echo $mag_couv; ?>" alt="Les réseaux du Parvis">
			</a>
		</section>
		<?php endif; ?>
	<?php wp_reset_postdata(); ?>
	<?php endif; ?>
</div>

<div class="l-home-col-3">

<!--  Extraits :  -->
	<?php
	$extraits_ID = get_cat_ID( 'extraits' );
	$query_args = array(
		'post_type' => 'post',
		'category_name' => 'extraits',
		'orderby' => 'date',
		'showposts' => 1
	);
	$the_query = new WP_Query( $query_args ); ?>
	<?php if ( $the_query->have_posts() ) : ?>

	<section class="our-widget">
		<h2 class="widget-title">Extraits</h2>

		<!-- the loop -->
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<?php $ouvrage_lie = get_field('ouvrage_lie'); ?>

		<!--  si c'est bien un extrait, on affiche : -->
		<?php if( $ouvrage_lie ): ?>
			<?php foreach( $ouvrage_lie as $ouvrage_lie ): ?>

			<div class="article-apercu">
				<div class="article-apercu_basics book">
					<a href="<?php echo get_permalink(); ?>">
						<img class="thumbnail" src="<?php echo get_the_post_thumbnail_url( $ouvrage_lie->ID , 'thumbnail' ); ?>" alt="<?php echo get_the_title($ouvrage_lie->ID); ?>">
					</a>
					<h3 class="article-apercu__title">
						<a href="<?php echo get_permalink(); ?>"><?php echo get_the_title( $ouvrage_lie->ID ); ?></a>
					</h3>
				</div>
				<div class="article-apercu__text">
					<section class="article-apercu__excerpt"><?php the_excerpt(); ?></section>
					<p><a class="more" href="<?php echo the_permalink(); ?>">Lire la suite</a></p>
				</div>
				<a class="btn block" href="<?php echo get_category_link( $extraits_ID ); ?> ">Découvrir d'autres extraits</a>
			</div>

			<?php endforeach; ?>
		<?php endif ?>

		<?php endwhile; ?>
		<!-- end of the loop -->

	</section>
	<?php wp_reset_postdata(); ?>
	<?php endif; ?>
</div>

</div>

<?php get_footer(); ?>