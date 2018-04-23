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