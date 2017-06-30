<?php
get_header();
get_sidebar(); ?>

<div class="l-site-content archive">

	<div class="l-page-content">

		<header class="article-header">

		<?php if ( is_tax('Collections') ) : ?>
	<!-- s'il y a c'est une archive de la taxonomy Collections -->
			<p class="nav-taxonomies">Collections : 
			<?php
			$args = array( 'hide_empty=0' );
		 
			$terms = get_terms( 'Collections', $args );
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
			    $count = count( $terms );
			    $i = 0;
			    $term_list = '';
			    foreach ( $terms as $term ) {
			        $i++;
			        $term_list .= '<a href="' . esc_url( get_term_link( $term ) ) . '">' . $term->name . '</a>';
			        if ( $count = $i ) {
			            $term_list .= ' ';
			        }
			    }
			    echo $term_list;
			}
			?>
			</p>	
		<?php endif; ?>

			<h1 class="article-title title"><?php single_term_title(); ?></h1>

		</header>

		<div class="article-apercu__list">

		<?php get_template_part('loop'); ?>

		</div>

	</div>

<?php get_footer(); ?>