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
         'name'               => 'Вакансии',
         'singular_name'      => 'Вакансия',
         'add_new'            => 'Добавить вакансию',
         'add_new_item'       => 'Добавление вакансии',
         'edit_item'          => 'Редактирование вакансии',
         'new_item'           => 'Новая вакансия',
         'view_item'          => 'Смотреть вакансию',
         'search_items'       => 'Искать вакансию',
         'not_found'          => 'Не найдено',
         'not_found_in_trash' => 'Не найдено в корзине',
         'parent_item_colon'  => '',
         'menu_name'          => 'Вакансии',
      ],
      'description'            => 'Вакансии',
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
         'name'              => 'Страны',
         'singular_name'     => 'Страны',
         'search_items'      => 'Поиск стран',
         'all_items'         => 'Все страны',
         'view_item '        => 'Смотреть страны',
         'parent_item'       => 'Страна',
         'parent_item_colon' => 'Страна:',
         'edit_item'         => 'Редактировать страну',
         'update_item'       => 'Обновить страны',
         'add_new_item'      => 'Добавить новую страну',
         'new_item_name'     => 'Новое имя страны',
         'menu_name'         => 'Страны',
         'back_to_items'     => '← Обратно в страны',
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
      'page_title' => 'Шапка и подвал',
      'menu_title' => 'Шапка и подвал',
      'menu_slug' => 'my-options',
      'capability' => 'edit_posts',
      'redirect' => false
   ));
}
