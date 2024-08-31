<?php

// Логика работы со странами
require_once __DIR__ . '/constants.php';
require_once __DIR__ . '/country.php';

/*
   Подключение стилей и скриптов
*/

add_action('wp_enqueue_scripts', 'theme_name_scripts');

function theme_name_scripts()
{
   wp_deregister_script('jquery');
   wp_register_script('jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', false, array(), true);
   wp_enqueue_script('jquery');
   wp_enqueue_style('style-swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
   wp_enqueue_script('script-swiper', "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js", array(), null, true);
   wp_enqueue_script('script-main', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);



   if ( is_singular( 'vacancies' )) {
      wp_enqueue_style('style-vacancy', get_stylesheet_directory_uri() . '/assets/css/vacancy.css');
      wp_enqueue_script('script-modal', get_stylesheet_directory_uri() . '/assets/js/modal.js', array('jquery'), null, true);
   }

   if (is_page_template('page-contacts.php')) {
      wp_enqueue_style('style-contacts', get_stylesheet_directory_uri() . '/assets/css/contacts.css');
      wp_enqueue_script('script-contacts', get_stylesheet_directory_uri() . '/assets/js/contacts.js', array('jquery'), null, true);
   }

   if (is_page_template('page-vacancies.php') || is_page_template('page-blog.php')) {
      wp_enqueue_style('style-vacancies', get_stylesheet_directory_uri() . '/assets/css/vacancies.css');
      wp_enqueue_script('script-filters', get_stylesheet_directory_uri() . '/assets/js/filters.js', array('jquery'), null, true);
   }

   if (is_page_template('front-page.php')) {
      wp_enqueue_style('style-main', get_stylesheet_directory_uri() . '/assets/css/main.css');
      wp_enqueue_script('script-main-page', get_stylesheet_directory_uri() . '/assets/js/mainPage.js', array('jquery'), null, true);
   }
   
}

/*
   Регистрация меню
*/

add_action('after_setup_theme', function () {
   register_nav_menus([
      'header_menu' => 'top',
      'footer_menu' => 'footer'
   ]);
});

/*
   Добавление СВГ формата в админку
*/

add_filter('upload_mimes', 'svg_upload_allow');

function svg_upload_allow($mimes)
{
   $mimes['svg']  = 'image/svg+xml';
   $mimes['svg']  = 'image/svg';

   return $mimes;
}


/**
 * Удаление гет-параметра
 * 
 * @param string $url - урл
 * @param string $varname - то, что нужно удалить
 */
function removeqsvar($url, $varname) {
   list($urlpart, $qspart) = array_pad(explode('?', $url), 2, '');
   parse_str($qspart, $qsvars);
   unset($qsvars[$varname]);
   $newqs = http_build_query($qsvars);
   return $urlpart . '?' . $newqs;
}

/**
 * Очищает пагинацию
 */
function resetPagination(){
   $need_reload_pagination = isset($_GET['needReload']) ? rest_sanitize_boolean($_GET['needReload']) : null;

   if($need_reload_pagination ){
      set_query_var('paged', 1);
      header('Location: '. removeqsvar( get_pagenum_link(1, false), 'needReload'));
   }
}

/**
 * Запрос для получения вакансий
 * 
 * @return Wp_Query
 */
function get_vacansies(){
   resetPagination();

   $args = array(
      'post_type' => 'vacancies',
      'posts_per_page' => 1,
      'paged' => get_query_var('paged')
   );

   add_filter_for_counties($args);
   add_search_for_query($args);

   $query = new WP_Query($args);

   return $query;

}

/**
 * Запрос для получения советов
 * 
 * @return Wp_Query
 */
function get_helps_articles(){
   resetPagination();

   $args = array(
      'post_type' => 'post',
      'posts_per_page' => 1,
      'paged' => get_query_var('paged')
   );

   add_filter_for_counties($args);
   add_search_for_query($args);

   $query = new WP_Query($args);

   return $query;

}

/**
 * Получает ссылку на страницу с вакансиями
 * (Костыль, ну и пофег)
 */
function get_vacansies_link_page(){
   return get_page_link(VACANCIES_PAGE_ID);
}