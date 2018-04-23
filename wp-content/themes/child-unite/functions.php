<?php 
/**
**  Created post Type Films
*/
function create_post_type_unite_films() {
  register_post_type( 'unite_films',
    array(
      'labels' => array(
        'name' => __( 'Films' ),
        'singular_name' => __( 'Film' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
}
add_action( 'init', 'create_post_type_unite_films' );

/**
**  Created taxonomy Ganre for unite_films
*/
add_action('init', 'create_taxonomy_unite_ganre');
function create_taxonomy_unite_ganre(){
  register_taxonomy('unite_ganre', array('unite_films'), array(
    'label'                 => '', 
    'labels'                => array(
      'name'              => __( 'Genres' ),
      'singular_name'     => __( 'Genre' ),
      'search_items'      => __( 'Search Genres' ),
      'all_items'         => __( 'All Genres' ),
      'view_item '        => __( 'View Genre' ),
      'parent_item'       => __( 'Parent Genre' ),
      'parent_item_colon' => __( 'Parent Genre:' ),
      'edit_item'         => __( 'Edit Genre' ),
      'update_item'       => __( 'Update Genre' ),
      'add_new_item'      => __( 'Add New Genre' ),
      'new_item_name'     => __( 'New Genre Name' ),
      'menu_name'         => __( 'Genre' ),
    ),
    'public'                => true,
    'hierarchical'          => true,
  ) );
}

/**
**  Created taxonomy Countries for unite_films
*/
add_action('init', 'create_taxonomy_unite_countries');
function create_taxonomy_unite_countries (){
  register_taxonomy('unite_countries', array('unite_films'), array(
    'labels'                => array(
      'name'              => __( 'Countries' ),
      'singular_name'     => __( 'Country' ),
      'search_items'      => __( 'Search Countries' ),
      'all_items'         => __( 'All Countries' ),
      'view_item '        => __( 'View Country' ),
      'parent_item'       => __( 'Parent Country' ),
      'parent_item_colon' => __( 'Parent Country:' ),
      'edit_item'         => __( 'Edit Country' ),
      'update_item'       => __( 'Update Country' ),
      'add_new_item'      => __( 'Add New Country' ),
      'new_item_name'     => __( 'New Country Name' ),
      'menu_name'         => __( 'Country' ),
    ),
    'public'                => true,
    'hierarchical'          => true,
  ) );
}

/**
**  Created taxonomy Year for unite_films
*/
add_action('init', 'create_taxonomy_unite_year');
function create_taxonomy_unite_year(){
  register_taxonomy('unite_year', array('unite_films'), array(
    'labels'                => array(
      'name'              => __( 'Year' ),
      'singular_name'     => __( 'Year' ),
      'search_items'      => __( 'Search Year' ),
      'all_items'         => __( 'All Year' ),
      'view_item '        => __( 'View Year' ),
      'parent_item'       => __( 'Parent Year' ),
      'parent_item_colon' => __( 'Parent Year:' ),
      'edit_item'         => __( 'Edit Year' ),
      'update_item'       => __( 'Update Year' ),
      'add_new_item'      => __( 'Add New Year' ),
      'new_item_name'     => __( 'New Year Name' ),
      'menu_name'         => __( 'Year' ),
    ),
    'public'                => true,
    'hierarchical'          => true,
  ) );
}

/**
**  Created taxonomy Actors for unite_films
*/
add_action('init', 'create_taxonomy_unite_actors');
function create_taxonomy_unite_actors(){
  register_taxonomy('unite_actors', array('unite_films'), array(
 'labels'                => array(
      'name'              => __( 'Actors' ),
      'singular_name'     => __( 'Actor' ),
      'search_items'      => __( 'Search Actors' ),
      'all_items'         => __( 'All Actors' ),
      'view_item '        => __( 'View Actor' ),
      'parent_item'       => __( 'Parent Actor' ),
      'parent_item_colon' => __( 'Parent Actor:' ),
      'edit_item'         => __( 'Edit Actor' ),
      'update_item'       => __( 'Update Actor' ),
      'add_new_item'      => __( 'Add New Actor' ),
      'new_item_name'     => __( 'New Actor Name' ),
      'menu_name'         => __( 'Actor' ),
    ),
    'public'                => true,
    'hierarchical'          => true,
  ) );
}

