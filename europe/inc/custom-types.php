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
         'name'               => __('Вакансии', 'europe'),
         'singular_name'      => __('Вакансия', 'europe'),
         'add_new'            => __('Добавить вакансию', 'europe'),
         'add_new_item'       => __('Добавление вакансии', 'europe'),
         'edit_item'          => __('Редактирование вакансии', 'europe'),
         'new_item'           => __('Новая вакансия', 'europe'),
         'view_item'          => __('Смотреть вакансию', 'europe'),
         'search_items'       => __('Искать вакансию', 'europe'),
         'not_found'          => __('Не найдено', 'europe'),
         'not_found_in_trash' => __('Не найдено в корзине', 'europe'),
         'parent_item_colon'  => '',
         'menu_name'          => __('Вакансии'),
      ],
      'description'            => __('Вакансии'),
      'public'              => true,
      'publicly_queryable'  => true,
      'exclude_from_search' => true,
      'show_ui'             => true,
      'show_in_nav_menus'   => true,
      'show_in_menu'        => true,
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

   register_taxonomy('country', ['vacancies', 'post'], [
      'label'                 => '',
      'labels'                => [
         'name'              => __('Страны', 'europe'),
         'singular_name'     => __('Страны', 'europe'),
         'search_items'      => __('Поиск стран', 'europe'),
         'all_items'         => __('Все страны', 'europe'),
         'view_item '        => __('Смотреть страны', 'europe'),
         'parent_item'       => __('Страна', 'europe'),
         'parent_item_colon' => __('Страна:', 'europe'),
         'edit_item'         => __('Редактировать страну', 'europe'),
         'update_item'       => __('Обновить страны', 'europe'),
         'add_new_item'      => __('Добавить новую страну', 'europe'),
         'new_item_name'     => __('Новое имя страны', 'europe'),
         'menu_name'         => __('Страны', 'europe'),
         'back_to_items'     => __('← Обратно в страны', 'europe'),
      ],
      'description'           => '',
      'public'                => true,
      'publicly_queryable'    => false,
      'show_in_rest'          => true, 
      'hierarchical'          => false,
      'rewrite'               => true,
   ]);
}

/*
   Регистрация и подключение options page Acf
*/
if (function_exists('acf_add_options_page')) {
   acf_add_options_page(array(
      'page_title' => __('Шапка и подвал', 'europe'),
      'menu_title' => __('Шапка и подвал', 'europe'),
      'menu_slug' => __('my-options'),
      'capability' => __('edit_posts'),
      'redirect' => false
   ));
}
