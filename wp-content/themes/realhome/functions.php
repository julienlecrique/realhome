<?php
add_action('wp_enqueue_scripts', 'insert_css');
function insert_css() {
	// On ajoute le css general du theme
	wp_enqueue_style('style', get_stylesheet_uri());

	wp_register_script('jquery','https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js');
	wp_enqueue_script('jquery');

	wp_register_script('anime','https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js');
	wp_enqueue_script('anime');

	wp_register_script('scroll','https://unpkg.com/scrollreveal/dist/scrollreveal.min.js');
	wp_enqueue_script('scroll');

	//    script.js
   wp_enqueue_script('script', get_template_directory_uri().'/script.js', '', '', true);
}



if (function_exists('register_sidebar'))
	register_sidebar(array('name'=>'sidebar',
		'before_widget'=>'<div>',
		'after_widget'=>'</div>',
		'before_title'=>'<h3>',
		'after_title'=>'</h3>',
		));

add_theme_support('menus'); register_nav_menus(array(
	'menu-principal' => 'Navigation principale',
	'menu-secondaire' => 'Navigation secondaire' ));

add_theme_support('post-thumbnails');


if ( function_exists('register_sidebar') )
	register_sidebar(array('name'=>'sidebar',
	                       'before_widget' => '<div>',
	                       'after_widget' => '</div>',
	                       'before_title' => '<h2>',
	                       'after_title' => '</h2>',
	));

function create_post_type() {
	register_post_type('Propriétés',
		array(
			'label'                 => __('Propriétés'),
			'singular_label'        => __('Propriété'),
			'add_new_item'          => __( 'Ajouter une propriété' ),
			'edit_item'             => __( 'Modifier une propriété' ),
			'new_item'              => __( 'Nouvelle propriété' ),
			'view_item'             => __( 'Voir la propriété' ),
			'search_items'          => __( 'Rechercher une propriété' ),
			'not_found'             =>  __( 'Aucune propriétés trouvé' ),
			'not_found_in_trash'    => __( 'Aucune propriétés trouvé' ),
			'public'                => true,
			'show_ui'               => true,
			'capability_type'       => 'post',
			'has_archive'           => true,
			'hierarchical'          => true,
			'menu_icon'             => 'dashicons-admin-multisite',
			'taxonomies'            => array('types'),
			'supports'              => array( 'title', 'editor', 'thumbnail'),
			'rewrite'               => array('slug' => 'proprietes', 'with_front' => true)
		)
	);
	register_post_type('Agents',
		array(
			'label'                 => __('Agents'),
			'singular_label'        => __('Agent'),
			'add_new_item'          => __( 'Ajouter un agent' ),
			'edit_item'             => __( 'Modifier un agent' ),
			'new_item'              => __( 'Nouvel agent' ),
			'view_item'             => __( "Voir l'agent "),
			'search_items'          => __( 'Rechercher un agent' ),
			'not_found'             =>  __( 'Aucuns agents trouvé' ),
			'not_found_in_trash'    => __( 'Aucuns agents trouvé' ),
			'public'                => true,
			'show_ui'               => true,
			'capability_type'       => 'post',
			'has_archive'           => true,
			'hierarchical'          => true,
			'menu_icon'             => 'dashicons-admin-users',
			'taxonomies'            => array('types'),
			'supports'              => array( 'title', 'editor', 'thumbnail'),
			'rewrite'               => array('slug' => 'agent', 'with_front' => true)
		)
	);
}
add_action( 'init', 'create_post_type' );

function themes_taxonomy() {
	register_taxonomy(
		'ville',
		'proprietes',
		array(
			'label' => 'Ville',
			'query_var' => true,
			'rewrite' => array(
				'slug' => 'ville',
				'with_front' => true
			),
			'hierarchical' => true,
		)
	);
	register_taxonomy(
		'profession',
		'agents',
		array(
			'label' => 'Profession',
			'query_var' => true,
			'rewrite' => array(
				'slug' => 'profession',
				'with_front' => true
			),
			'hierarchical' => true,
		)
	);

}
add_action( 'init', 'themes_taxonomy');

	function remove_footer_admin () {

		echo 'Réalisé par  <a href="#" target="_blank">Lecrique Julien</a></p>';

	}

	add_filter('admin_footer_text', 'remove_footer_admin');


// page option ACF
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
	));
}