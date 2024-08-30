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
        
         <?php get_template_part('/template-parts/vacancies-filter')?>

         <div class="advertisments__list vacancies__advertisments">

            <?php

            $args = array(
               'post_type' => 'vacancies',
               'posts_per_page' => 1,
               'paged' => get_query_var('page')
            );

            $query = new WP_Query($args);

            if ($query->have_posts()): ?>

               <?php while ($query->have_posts()):  $query->the_post();?>
                     
                     <?php get_template_part('/template-parts/vacancy-card')?>

               <?php endwhile; ?>
               
               <?php wp_reset_postdata(); ?>

               <div class="advertisments__pagination pagination">

                  <?php var_dump(get_permalink())?>

                  <?php
                  echo paginate_links(array(
                     'base'    =>  get_permalink() .'?page=%#%' ,
                     'current' => max( 1, get_query_var('paged') ),
                     'total'   => $query->max_num_pages,
                     'prev_text'    => '<div class="page-numbers page-numbers--prev "></div>',
                     'next_text'    => '<div class="page-numbers page-numbers--next"></div>',
                     'show_all'     => false,
                     'end_size'     => 1,
                     'mid_size'     => 1,

                  ));
                  ?>
               </div>


            <?php endif;?>

         </div>
      </div>
   </div>
</main>

<?php get_footer() ?>