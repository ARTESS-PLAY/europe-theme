<?php

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


   if (is_page_template('page-vacancies.php')) {
      wp_enqueue_style('style-vacancies', get_stylesheet_directory_uri() . '/assets/css/vacancies.css');
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

/*
   Реализация поиска по пост тайп Vacancies
*/

add_filter('pre_get_posts', 'custom_search_query');

function custom_search_query($query)
{
   if ($query->is_search() && ! is_admin()) {
      if (isset($_GET['post_type']) && $_GET['post_type'] === 'vacancies') {
         $query->set('post_type', 'vacancies');
      }
   }
   return $query;
}
