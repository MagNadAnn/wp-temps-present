<?php

if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_title' => '<p class="menu-section">',
        'after_title' => '</p>',
    ));

add_theme_support( 'post-thumbnails' );

add_action( 'init', 'create_post_type' );
function create_post_type() {

	register_post_type(
	  'ouvrage',
	  array(
	    'label' => 'Ouvrages',
	    'labels' => array(
	      'name' => 'Ouvrages',
	      'singular_name' => 'Ouvrage',
	      'all_items' => 'Tous les ouvrages',
	      'add_new_item' => 'Ajouter un ouvrage',
	      'edit_item' => 'Éditer le ouvrage',
	      'new_item' => 'Nouvel ouvrage',
	      'view_item' => 'Voir l\'ouvrage',
	      'search_items' => 'Rechercher parmi les ouvrages',
	      'not_found' => 'Pas d\'ouvrage trouvé',
	      'not_found_in_trash'=> 'Pas d\'ouvrage dans la corbeille'
	      ),
	    'public' => true,
	    'capability_type' => 'post',
	    'menu_position' => 5,
	    'supports' => array(
	      'title',
	      'editor',
	      'thumbnail'
	    ),
	    'has_archive' => true
	  )
	);

	register_taxonomy(
	  'Collections',
	  'ouvrage',
	  array(
	    'label' => 'Collections',
	    'labels' => array(
		    'name' => 'Collection',
		    'singular_name' => 'Collection',
		    'all_items' => 'Toutes les collections',
		    'edit_item' => 'Éditer la collection',
		    'view_item' => 'Voir la collection',
		    'update_item' => 'Mettre à jour la collection',
		    'add_new_item' => 'Ajouter une collection',
		    'new_item_name' => 'Nouvelle collections',
		    'search_items' => 'Rechercher parmi les collections',
		    'popular_items' => 'Collection les plus utilisées'
		  ),
	  'hierarchical' => true,
	  'show_in_nav_menus' => true,
	  'show_in_quick_edit' => true,
	  'show_admin_column' => true,
	  'query_var' => true,
	  'rewrite' => true
	  )
	);

	register_taxonomy(
	  'Auteurs',
	  'ouvrage',
	  array(
	    'label' => 'Auteurs',
	    'labels' => array(
		    'name' => 'Auteurs',
		    'singular_name' => 'Auteur',
		    'all_items' => 'Tous les auteurs',
		    'edit_item' => 'Éditer l\'auteur',
		    'view_item' => 'Voir l\'auteur',
		    'update_item' => 'Mettre à jour l\'auteur',
		    'add_new_item' => 'Ajouter un auteur',
		    'new_item_name' => 'Nouvel auteur',
		    'search_items' => 'Rechercher parmi les auteurs',
		    'popular_items' => 'Auteurs les plus utilisés'
		  ),
	  'hierarchical' => false,
	  'show_in_nav_menus' => true,
	  'show_in_quick_edit' => true,
	  'show_admin_column' => true,
	  'query_var' => true,
	  'rewrite' => true
	  )
	);

	register_taxonomy(
	  'thematique',
	  'ouvrage',
	  array(
	    'label' => 'Thématiques',
	    'labels' => array(
		    'name' => 'Thématiques',
		    'singular_name' => 'Thématique',
		    'all_items' => 'Toutes les thématiques',
		    'edit_item' => 'Éditer la thématique',
		    'view_item' => 'Voir la thématiques',
		    'update_item' => 'Mettre à jour la thématiques',
		    'add_new_item' => 'Ajouter une thématique',
		    'new_item_name' => 'Nouvelle thématiques',
		    'search_items' => 'Rechercher parmi les thématiques',
		    'popular_items' => 'Thématiques les plus utilisées'
		  ),
	  'hierarchical' => false,
	  'show_tagcloud' => true,
	  'show_in_quick_edit' => true,
	  'show_admin_column' => true,
	  'query_var' => true,
	  'rewrite' => true
	  )
	);
	
}
