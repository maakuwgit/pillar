<?php

/**
* Custom post types
*
* @since Pillar 2.8
* @author MaakuW
*/
function pillar_register_posttypes() {

	//Adding Members (more robust than we need, likely)
	$labels = array(
		'name'               => _x( 'News', 'articles general name', 'pillar' ),
		'singular_name'      => _x( 'Article', 'articles type singular name', 'pillar' ),
		'add_new'            => _x( 'Add New Article', 'articles', 'pillar' ),
		'add_new_item'       => __( 'Add New Article', 'pillar' ),
		'edit_item'          => __( 'Edit Article', 'pillar' ),
		'new_item'           => __( 'New Article', 'pillar' ),
		'all_items'          => __( 'All Articles', 'pillar' ),
		'view_item'          => __( 'View Article', 'pillar' ),
		'search_items'       => __( 'Search Members', 'pillar' ),
		'not_found'          => __( 'Nothing found', 'pillar' ),
		'not_found_in_trash' => __( 'Nothing found in Trash', 'pillar' ),
		'parent_item_colon'  => '',
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'can_export'         => true,
		'show_in_nav_menus'  => true,
		'query_var'          => true,
		'has_archive'        => true,
		'rewrite'            => apply_filters( 'pillar_articles_posttype_rewrite_args', array(
			'feeds'      => true,
			'slug'       => 'news_and_events',
			'with_front' => true,
		) ),
		'capability_type'    => 'post',
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'excerpt', 'page-attributes', 'custom-fields' ),
	);

	register_post_type( 'article', apply_filters( 'pillar_members_posttype_args', $args ) );
	
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Teams', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Team', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Teams', 'textdomain' ),
		'all_items'         => __( 'All Teams', 'textdomain' ),
		'parent_item'       => __( 'Parent Team', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Team:', 'textdomain' ),
		'edit_item'         => __( 'Edit Team', 'textdomain' ),
		'update_item'       => __( 'Update Team', 'textdomain' ),
		'add_new_item'      => __( 'Add New Team', 'textdomain' ),
		'new_item_name'     => __( 'New Team Name', 'textdomain' ),
		'menu_name'         => __( 'Team', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'team' ),
	);

	register_taxonomy( 'team', array( 'member' ), $args );
	
	$labels = array(
		'name'               => _x( 'Organization', 'members general name', 'pillar' ),
		'singular_name'      => _x( 'Member', 'members type singular name', 'pillar' ),
		'add_new'            => _x( 'Add New Member', 'members', 'pillar' ),
		'add_new_item'       => __( 'Add New Member', 'pillar' ),
		'edit_item'          => __( 'Edit Member', 'pillar' ),
		'new_item'           => __( 'New Member', 'pillar' ),
		'all_items'          => __( 'All Members', 'pillar' ),
		'view_item'          => __( 'View Member', 'pillar' ),
		'search_items'       => __( 'Search Members', 'pillar' ),
		'not_found'          => __( 'Nothing found', 'pillar' ),
		'not_found_in_trash' => __( 'Nothing found in Trash', 'pillar' ),
		'parent_item_colon'  => '',
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'can_export'         => true,
		'show_in_nav_menus'  => true,
		'query_var'          => true,
		'has_archive'        => true,
		'rewrite'            => apply_filters( 'pillar_members_posttype_rewrite_args', array(
			'feeds'      => true,
			'slug'       => 'organization',
			'with_front' => true,
		) ),
		'capability_type'    => 'post',
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'excerpt', 'page-attributes' ),
	);

	register_post_type( 'member', apply_filters( 'pillar_members_posttype_args', $args ) );
}
add_action( 'init', 'pillar_register_posttypes', 0 );
?>