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
        $new_box = '';

         // Output Taxonomy Country
        if ( taxonomy_exists( 'unite_countries' ) ) {
            $new_box .= '<div>';
            $new_box .= __( 'Страна: ' );
            $terms = get_the_terms( $id, 'unite_countries' );
            foreach ($terms as $term) {                
                $new_box .= ' <a href="' . get_term_link( $term->name, 'unite_countries' ) . '">' . $term->name . '</a>';
            }
            $new_box .= '</div>';
        }

        // Output Taxonomy Ganre
        if ( taxonomy_exists( 'unite_ganre' ) ) {
            $new_box .= '<div>';
            $new_box .= __( 'Жанры: ' );
            $terms = get_the_terms( $id, 'unite_ganre' );
            foreach ($terms as $term) {                
                $new_box .= ' <a href="' . get_term_link( $term->name, 'unite_ganre' ) . '">' . $term->name . '</a>';
            }
            $new_box .= '</div>';
        }

        // Output Custom Field Price
        if ( $price = get_post_meta($id, 'value' ) ) {
            $new_box .= '<div>';
            $new_box .= __( 'Цена: ' );
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
            $new_box .= '<div>';
            $new_box .= __( 'Дата выхода: ' );
            if ( is_array($date) ) {
                foreach ($date as $value) {
                    $new_box .= '<span>' . $value . '</span> ';
                }
            } else {
               $new_box .= '<span>' . $date . '</span>';
            }
            $new_box .= '</div>';
        }    

        // Add received content    
        return $content . $new_box;
    } else {
        return $content;
    }
}