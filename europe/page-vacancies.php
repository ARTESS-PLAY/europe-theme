<?php
/*
Template Name: Шаблон страницы вакансии
Template Post Type: page
*/

get_header() ?>

<div class="search">
   <div class="container">
      <h1 class="search__text">
         <?php echo __('Вакансии', 'europe'); ?><span class="text--green-1">.</span><span class="search__count">(<?php echo wp_count_posts('vacancies')->publish ?>)</span>
      </h1>
      <form action="" method="get" class="search_form">
         <input step="1" placeholder="Введите поисковый запрос, например, Сварщик Германия" type="text"
            class="filed search__filed" />
         <button class="button__filed" type="submit"></button>
      </form>
   </div>
</div>

<main class="vacancies">
   <div class="container">
      <div class="vacancies__up">
         <div id="open_filters_mob"></div>
         <p class="vacancies__text">
            <?php echo __('Количество подходящих вакансий:&nbsp;', 'europe'); ?><span class="vacancies__count"><?php echo wp_count_posts('vacancies')->publish ?></span>.
         </p>
      </div>

      <div class="vacancies__content">
         <form action="." method="post" class="filters main__filters">
            <div id="mob_close_filters"></div>
            <div class="filters__block">
               <h3 class="filters__block__title">Фильтр</h3>
               <div class="filters__block__content">
                  <label for="name1" class="checkbox">
                     <input type="checkbox" name="name" id="name1" value="1" />
                     <div class="checkmark"></div>
                     <p>Name 1</p>
                  </label>
                  <label for="name2" class="checkbox">
                     <input type="checkbox" name="name" id="name2" value="2" />
                     <div class="checkmark"></div>
                     <p>Name 2</p>
                  </label>
                  <label for="name3" class="checkbox">
                     <input type="checkbox" name="name" id="name3" value="3" />
                     <div class="checkmark"></div>
                     <p>Name 3</p>
                  </label>
               </div>
            </div>
            <div class="filters__block">
               <h3 class="filters__block__title">sname</h3>
               <div class="filters__block__content">
                  <label for="sname1" class="checkbox">
                     <input type="checkbox" name="sname" id="sname1" value="1" />
                     <div class="checkmark"></div>
                     <p>Name 1</p>
                  </label>
                  <label for="sname2" class="checkbox">
                     <input type="checkbox" name="sname" id="sname2" value="2" />
                     <div class="checkmark"></div>
                     <p>Name 2</p>
                  </label>
                  <label for="sname3" class="checkbox">
                     <input type="checkbox" name="sname" id="sname3" value="3" />
                     <div class="checkmark"></div>
                     <p>Name 3</p>
                  </label>
               </div>
            </div>
            <div class="filters__block filters__block--submit">
               <button type="submit">Применить</button>
            </div>
         </form>

         <div class="advertisments vacancies__advertisments">

            <?php

            $args = array(
               'post_type' => 'vacancies',
               'posts_per_page' => 5,
               'paged' => get_query_var('page')
            );

            $query = new WP_Query($args);

            if ($query->have_posts()): ?>
               <?php while ($query->have_posts()):  $query->the_post();?>
                     
                     <?php get_template_part('/template-parts/vacancy-card')?>

               <?php endwhile; ?>

               <div class="advertisments__pagination pagination">

                  <?php
                  echo paginate_links(array(
                     'base' => '%_%',
                     'format' => '?page=%#%',
                     'type' => 'plain',
                     'total' => $query->max_num_pages,
                     'prev_text'    => '<div class="page-numbers page-numbers--prev "></div>',
                     'next_text'    => '<div class="page-numbers page-numbers--next"></div>',
                     'show_all'     => false,
                     'end_size'     => 1,
                     'mid_size'     => 1,

                  ));
                  ?>
               </div>


            <?php endif;  wp_reset_postdata(); ?>

         </div>
      </div>
   </div>
</main>

<?php get_footer() ?>