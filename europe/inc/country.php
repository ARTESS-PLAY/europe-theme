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

/**
 * Получает все страны из гет-параметров
 * 
 * @return array<int>
 */
function get_params_countries(){
    if(isset($_GET['countries'])){
        $arr =  json_decode(stripslashes($_GET['countries']), true);

        if(is_array( $arr)) return  $arr;

        return [];
    }
   
    return [];
}

/**
 * Работа с поиском по странам
 * 
 * Функция мутирует исходный запрос
 */
function add_searchCounties_for_query(&$args){
    $search = isset($_GET['searchCountry']) ? $_GET['searchCountry'] : null;

    if(!$search) return;

    $search = esc_sql(sanitize_text_field($search));
    $args['s'] = $search;
}

/**
 * Добавляет фильтрацию по странам в запрос
 * 
 * Функция мутирует исходный запрос
 * 
 * @param array $args - массив данных, который пойдёт в Wp_query
 */
function add_filter_for_counties(&$args){
    $counries_ids = get_params_countries();

    // Если нет фильтра по странам
    if(!count($counries_ids)) return;

    $tax_query = $args['tax_query'];

    if(!$tax_query){
        $tax_query = [
            'relation' => 'OR',
        ];

        $args['tax_query'] = $tax_query;
    }

    $coutry_query = [
        'taxonomy' => 'country',
        'field'    => 'id',
        'terms'    => $counries_ids,
    ];

    array_push( $args['tax_query'], $coutry_query);

}