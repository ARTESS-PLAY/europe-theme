<?php
/*
Template Name: Шаблон страницы вакансии
Template Post Type: page
*/

get_header() ?>

<div class="search">
   <div class="container">
      <h1 class="search__text">
         Вакансии<span class="text--green-1">.</span><span class="search__count">(<?php echo wp_count_posts('vacancies')->publish ?>)</span>
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
            Количество подходящих вакансий:&nbsp;<span class="vacancies__count"><?php echo wp_count_posts('vacancies')->publish ?></span>.
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
            <div class="advertisments__list">
               <?php
               $args = array(
                  'post_type' => 'vacancies',
                  'posts_per_page' => 5,
               );

               $query = new WP_Query($args);

               if ($query->have_posts()) :
                  while ($query->have_posts()) : $query->the_post();
               ?>
                     <article class="advertisment-article">
                        <a href="<?php the_permalink(); ?>">
                           <div class="advertisment__image">
                              <div class="advertisment__image__wrapper">
                                 <?php the_post_thumbnail(); ?>
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
                                       <img src="<?php bloginfo('template_url'); ?>/assets-europe/img/flags/pl.svg" />
                                    </div>
                                    <p class="advertisment__location__county__name">
                                       <span>Германия</span>, <span>Cloppenburg</span>
                                    </p>
                                 </div>
                                 <div class="advertinsments__salary">
                                    <p class="advertinsments__salary__sum">
                                       2.100.00 EUR
                                    </p>
                                    <p class="advertinsments__salary__date">
                                       netto / месяц
                                    </p>
                                 </div>
                              </div>
                              <div class="advertisment__bottom vacancy__requirements">
                                 <div class="vacancy__requirements-wrapper">
                                    <div class="vacancy__requirement">
                                       <div class="vacancy__requirement-image orange-bg">
                                          <img src="<?php bloginfo('template_url'); ?>/assets-europe/img/requirements/1.svg" />
                                       </div>
                                       <div class="vacancy__requirement-text">
                                          Со знанием иностранного языка
                                       </div>
                                       <div class="vacancy__requirement-tooltip">
                                          <div class="tooltip-content">
                                             <span class="tooltip-text">Язык:
                                                <span class="text-bold">Английский</span></span>
                                             <span class="tooltip-text">Уровень:
                                                <span class="text-bold">Коммуникативный</span></span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="vacancy__requirement">
                                       <div class="vacancy__requirement-image orange-bg">
                                          <img src="<?php bloginfo('template_url'); ?>/assets-europe/img/requirements/2.svg" />
                                       </div>
                                       <div class="vacancy__requirement-text">
                                          Мин. лет опыта: 3
                                       </div>
                                    </div>
                                    <div class="vacancy__requirement">
                                       <div class="vacancy__requirement-image orange-bg">
                                          <img src="<?php bloginfo('template_url'); ?>/assets-europe/img/requirements/3.svg" />
                                       </div>
                                       <div class="vacancy__requirement-text">
                                          Требуется CV
                                       </div>
                                    </div>
                                    <div class="vacancy__requirement">
                                       <div class="vacancy__requirement-image grey-bg">
                                          <img src="<?php bloginfo('template_url'); ?>/assets-europe/img/requirements/4.svg" />
                                       </div>
                                       <div class="vacancy__requirement-text grey-text">
                                          Работа для пар
                                       </div>
                                    </div>
                                    <div class="vacancy__requirement">
                                       <div class="vacancy__requirement-image green-bg">
                                          <img src="<?php bloginfo('template_url'); ?>/assets-europe/img/requirements/5.svg" />
                                       </div>
                                       <div class="vacancy__requirement-text">
                                          Проживание предоставляется
                                       </div>
                                    </div>
                                    <div class="vacancy__requirement">
                                       <div class="vacancy__requirement-image green-bg">
                                          <img src="<?php bloginfo('template_url'); ?>/assets-europe/img/requirements/6.svg" />
                                       </div>
                                       <div class="vacancy__requirement-text">
                                          Предоставляемый транспорт
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </a>
                     </article>
               <?php
                  endwhile;
               else :
                  echo 'No vacancies found.';
               endif;

               wp_reset_postdata();
               ?>

            </div>

            <div class="advertisments__pagination pagination">
               <?php
               echo paginate_links(array(
                  'total' => $query->max_num_pages,
                  'prev_text'    => '<div class="page-numbers page-numbers--prev "></div>',
                  'next_text'    => '<div class="page-numbers page-numbers--next"></div>',
                  'current'      => 1,
                  'show_all'     => false,
                  'end_size'     => 1,
                  'mid_size'     => 1,

               ));
               ?>
            </div>
         </div>
      </div>
   </div>
</main>

<?php get_footer() ?>