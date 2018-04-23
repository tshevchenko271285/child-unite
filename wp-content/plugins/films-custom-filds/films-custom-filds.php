<?php
/*
Plugin Name: Films Castom Filds
Description: Вывод дополнительных полей в архиве кастомного поста Фильмы
Version: 1.0
Author: TShevchenko
Author URI: http://tshevchenko.tk/unite/
*/

add_action( "the_content", "unite_archive_films_custom_fields" );
 
function unite_archive_films_custom_fields( $content ) {

    if ( is_archive( 'unite_films' ) ) {
        $id = get_the_id();
        $new_box = '<div class="row">';

         // Output Taxonomy Country
        if ( taxonomy_exists( 'unite_countries' ) ) {
            $new_box .= '<div class="col-md-6">';
            $new_box .= '<span class="glyphicon glyphicon-home" aria-hidden="true"></span> ';
            $new_box .= '<span>' . __( 'Страна: ' ) . '</span>';
            $terms = get_the_terms( $id, 'unite_countries' );
            foreach ($terms as $term) {                
                $new_box .= ' <a href="' . get_term_link( $term->name, 'unite_countries' ) . '">' . $term->name . '</a>';
            }
            $new_box .= '</div>';
        }

        // Output Taxonomy Ganre
        if ( taxonomy_exists( 'unite_ganre' ) ) {
            $new_box .= '<div class="col-md-6">';
            $new_box .= '<span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span> ';
            $new_box .= '<span>' . __( 'Жанр: ' ) . '</span>';
            $terms = get_the_terms( $id, 'unite_ganre' );
            foreach ($terms as $term) {                
                $new_box .= ' <a href="' . get_term_link( $term->name, 'unite_ganre' ) . '">' . $term->name . '</a>';
            }
            $new_box .= '</div>';
        }

        // Output Custom Field Price
        if ( $price = get_post_meta($id, 'value' ) ) {
            $new_box .= '<div class="col-md-6">';
            $new_box .= '<span class="glyphicon glyphicon-euro" aria-hidden="true"></span> ';
            $new_box .= '<span class="label">' . __( 'Цена: ' ) . '</span>';
            if ( is_array($price) ) {
                foreach ($price as $value) {
                    $new_box .= '<span>' . $value . __( ' грн.' ). '</span> ';
                }
            } else {
               $new_box .= '<span>' . $price . __( ' грн.' ). '</span>';
            }
            $new_box .= '</div>';
        }

        // Output Custom Field Date
        if ( $date = get_post_meta($id, 'date' ) ) {
            $new_box .= '<div class="col-md-6">';
            $new_box .= '<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> ';
            $new_box .= '<span class="label">' . __( 'Дата выхода: ' ) . '</span>';
            if ( is_array($date) ) {
                foreach ($date as $value) {
                    $new_box .= '<span>' . $value . '</span> ';
                }
            } else {
               $new_box .= '<span>' . $date . '</span>';
            }
            $new_box .= '</div>';
        }    
        $new_box .= '</div>';
        // Add received content    
        return $content . $new_box;
    } else {
        return $content;
    }
}