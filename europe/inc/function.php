<?php

add_action('wp_enqueue_scripts', 'theme_name_scripts');
function theme_name_scripts()
{

   wp_enqueue_style('style-swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
   wp_enqueue_style('style-main', get_template_directory_uri() . '/assets-europe/css/main.css');
   wp_enqueue_style('style-contacts', get_template_directory_uri() . '/assets-europe/css/contacts.css');

   if (is_page_template('single-vacancies.php')) {
      wp_enqueue_style('style-vacancy', get_template_directory_uri() . '/assets-europe/css/vacancy.css');
   }
   if (is_page_template('page-vacancies.php')) {
      wp_enqueue_style('style-vacancies', get_template_directory_uri() . '/assets-europe/css/vacancies.css');
   }

   wp_deregister_script('jquery');
   wp_register_script('jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', false, array(), true);
   wp_enqueue_script('jquery');
   wp_enqueue_script('script-swiper', "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js", array(), null, true);
   wp_enqueue_script('script-main-page', get_template_directory_uri() . '/assets-europe/js/mainPage.js', array('jquery'), null, true);

   wp_enqueue_script('script-main', get_template_directory_uri() . '/assets-europe/js/main.js', array('jquery'), null, true);
   wp_enqueue_script('script-contacts', get_template_directory_uri() . '/assets-europe/js/contacts.js', array('jquery'), null, true);
}

add_action('after_setup_theme', function () {
   register_nav_menus([
      'header_menu' => 'top',
      'footer_menu' => 'footer'
   ]);
});

add_filter('upload_mimes', 'svg_upload_allow');

function svg_upload_allow($mimes)
{
   $mimes['svg']  = 'image/svg+xml';

   return $mimes;
}

function get_vacancies_posts($posts_per_page = 5)
{
   $args = array(
      'post_type' => 'vacancies',
      'posts_per_page' => $posts_per_page,

   );
   return new WP_Query($args);
}

// подключение option page acf
if (function_exists('acf_add_options_page')) {
   acf_add_options_page(array(
      'page_title' => 'Шапка и подвал',
      'menu_title' => 'Шапка и подвал',
      'menu_slug' => 'my-options',
      'capability' => 'edit_posts',
      'redirect' => false
   ));
}
