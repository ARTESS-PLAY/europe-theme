<?php
/**
 * Все функции для работы со странами
 */

/**
 * Получает все страны
 * 
 * @return array<WP_Term>
 */
function get_all_counties(){
    $counties = get_terms(array(
        'taxonomy' => 'country',
        'hide_empty' => false,
     ));

    if(is_wp_error($counties)){
        $counties = [];
    }

    return $counties;
}