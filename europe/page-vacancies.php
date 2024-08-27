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

            if ($query->have_posts()) {
               while ($query->have_posts()) {
                  $query->the_post();
            ?>
                  <article class="advertisment-article">
                     <a href="<?php the_permalink(); ?>">
                        <div class="advertisment__image">
                           <div class="advertisment__image__wrapper">
                              <?php the_post_thumbnail([120, 120]); ?>
                           </div>
                        </div>
                        <div class="advertisment__content">
                           <div class="advertisment__heard">
                              <h2>
                                 <?php the_title(); ?>
                              </h2>

                              <div class="advertisment__info">
                                 <?php echo '<p class="advertisment__info__company">' . get_the_excerpt() . '</p>'; ?>
                                 <p class="advertisment__info__date">
                                    <?php the_date('F j, Y'); ?>

                                 </p>
                              </div>
                           </div>
                           <div class="advertisment__location">
                              <div class="advertisment__location__county">
                                 <div class="advertisment__location__county__flag">
                                    <img src="<?php echo get_stylesheet_directory_uri() ?> /assets/img/flags/pl.svg" />
                                 </div>
                                 <p class="advertisment__location__county__name">
                                    <span>Германия</span>, <span>Cloppenburg</span>
                                 </p>
                              </div>

                              <div class="advertinsments__salary">
                                 <p class="advertinsments__salary__sum">
                                    <?php the_field('vacancies_price'); ?>
                                 </p>
                                 <p class="advertinsments__salary__date">
                                    <?php the_field('vacancies_currency'); ?>
                                 </p>
                              </div>
                           </div>
                           <div class="advertisment__bottom vacancy__requirements">
                              <div class="vacancy__requirements-wrapper">

                                 <?php if (get_field('vacancies_repeater_req')): ?>
                                    <?php while (has_sub_field('vacancies_repeater_req')): ?>

                                       <div class="vacancy__requirement">
                                          <div class="vacancy__requirement-image <?php echo the_sub_field('vacancies_repeater_req-color'); ?>-bg">
                                             <img src="<?php the_sub_field('vacancies_repeater_req-img'); ?>" />

                                          </div>
                                          <p class="vacancy__requirement-text">
                                             <?php the_sub_field('vacancies_repeater_req-title'); ?>

                                          </p>

                                          <div class="vacancy__requirement-tooltip">
                                             <div class="tooltip-content">
                                                <p class="tooltip-text">
                                                   <?php the_sub_field('vacancies_repeater_req-text'); ?>
                                             </div>
                                             </p>
                                          </div>

                                       </div>

                                       <p class="contacts__article-text"><?php the_sub_field('vacancies_repeater'); ?></p>

                                       <p class="vacancy__condition">
                                          <span class="vacancy__condition-title"><?php the_sub_field('vacancies_repeater-title'); ?></span>
                                          <span class="vacancy__condition-note"><?php the_sub_field('vacancies_repeater-text'); ?></span>
                                       </p>

                                    <?php endwhile; ?>
                                 <?php endif; ?>

                              </div>
                           </div>
                        </div>
                     </a>
                  </article>
               <?php

               }
               ?>
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


            <?php
            } else {
            }
            wp_reset_postdata();
            ?>

         </div>
      </div>
   </div>
</main>

<?php get_footer() ?>