<?php
add_action('init', 'create_taxonomy');
add_action('init', 'register_post_types');

/*
   Регистрация нового типа записи - Вакансии
*/

function register_post_types()
{

   register_post_type('vacancies', [
      'label'  => null,
      'labels' => [
         'name'               => __('Вакансии'),
         'singular_name'      => __('Вакансия'),
         'add_new'            => __('Добавить вакансию'),
         'add_new_item'       => __('Добавление вакансии'),
         'edit_item'          => __('Редактирование вакансии'),
         'new_item'           => __('Новая вакансия'),
         'view_item'          => __('Смотреть вакансию'),
         'search_items'       => __('Искать вакансию'),
         'not_found'          => __('Не найдено'),
         'not_found_in_trash' => __('Не найдено в корзине'),
         'parent_item_colon'  => '',
         'menu_name'          => __('Вакансии'),
      ],
      'description'            => __('Вакансии'),
      'public'                 => true,
      'publicly_queryable'  => true,
      'exclude_from_search' => true,
      'show_ui'             => true,
      'show_in_nav_menus'   => true,
      'show_in_menu'           => true,
      'show_in_admin_bar'   => true,
      'show_in_rest'        => true,
      'rest_base'           => null,
      'menu_position'       => 4,
      'menu_icon'           => null,
      'hierarchical'        => false,
      'supports'            => ['title', 'editor', 'excerpt', 'thumbnail'],
      'taxonomies'          => ['country'],
      'has_archive'         => false,
      'rewrite'             => true,
      'query_var'           => true,
   ]);
}

/*
   Регистрация таксономии - Страны
*/

function create_taxonomy()
{

   register_taxonomy('country', ['vacancies'], [
      'label'                 => '',
      'labels'                => [
         'name'              => __('Страны'),
         'singular_name'     => __('Страны'),
         'search_items'      => __('Поиск стран'),
         'all_items'         => __('Все страны'),
         'view_item '        => __('Смотреть страны'),
         'parent_item'       => __('Страна'),
         'parent_item_colon' => __('Страна:'),
         'edit_item'         => __('Редактировать страну'),
         'update_item'       => __('Обновить страны'),
         'add_new_item'      => __('Добавить новую страну'),
         'new_item_name'     => __('Новое имя страны'),
         'menu_name'         => __('Страны'),
         'back_to_items'     => __('← Обратно в страны'),
      ],
      'description'           => '',
      'public'                => true,
      'publicly_queryable'    => null,
      'hierarchical'          => false,
      'rewrite'               => true,
   ]);
}

/*
   Регистрация и подключение options page Acf
*/
if (function_exists('acf_add_options_page')) {
   acf_add_options_page(array(
      'page_title' => __('Шапка и подвал'),
      'menu_title' => __('Шапка и подвал'),
      'menu_slug' => __('my-options'),
      'capability' => __('edit_posts'),
      'redirect' => false
   ));
}
