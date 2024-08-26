<?php
/*
Template Name: Шаблон главной страницы
Template Post Type: page
*/
get_header();
?>

<div class="wrapper" style="background-image:url(<?php the_field('main_img'); ?>">
   <div class="wrapper__arrows">
      <img src="<?php bloginfo('template_url'); ?>/assets-europe/img/arrow-1.png" class="arrow-1" />
      <img src="<?php bloginfo('template_url'); ?>/assets-europe/img/arrow-2.png" class="arrow-2" />
   </div>
   <div class="wrapper__search">
      <div class="wrapper__search-text">
         <?php the_field('main_text'); ?>
      </div>
      <?php get_search_form(); ?>
   </div>
   <div class="wrapper__slider">
      <p class="wrapper__slider-title">Работа в Европе</p>
      <div class="swiper wrapper__slider-carousel">
         <div class="swiper-button-prev"></div>
         <div class="swiper-wrapper">

            <?php
            $terms = get_terms(array(
               'taxonomy' => 'country',
               'hide_empty' => false,
            ));

            if (!empty($terms) && !is_wp_error($terms)) {
               foreach ($terms as $term) {

            ?>
                  <div class="swiper-slide">
                     <a class="swiper-slide__link" href="#">
                        <div class="flag-wrapper-tooltip">
                           <div class="flag-wrapper">
                              <img
                                 class="flag-wrapper__img"
                                 alt="<?php echo esc_html($term->name); ?>"
                                 width="48"
                                 height="48"
                                 src=" " />

                           </div>

                           <div class="tooltip">
                              <span class="tooltip__text">Вакансии - <?php echo esc_html($term->name); ?></span>

                           </div>

                        </div>
                        <p class="country-name"><?php echo esc_html($term->name); ?></p>
                     </a>
                  </div>
            <?php
               }
            }
            ?>

         </div>
         <div class="swiper-button-next"></div>
      </div>
   </div>
</div>

<div class="container">
   <div class="articles">
      <div class="articles__title">
         <p>Последние статьи</p>
         <div class="articles__title-green"></div>
      </div>
      <div class="swiper-articles articles__list">
         <div class="swiper-button-prev"></div>
         <div class="swiper-wrapper">
            <?php
            $args = array(
               'posts_per_page' => 4,
               'post_type' => 'post',
               'orderby' => 'date',
               'order' => 'DESC'
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) {
               while ($query->have_posts()) {
                  $query->the_post();
            ?>
                  <div class="swiper-slide">
                     <a class="swiper-slide__link" href=<?php the_permalink(); ?>>
                        <div class="swiper-slide__card">
                           <div class="swiper-slide__card-img">
                              <?php the_post_thumbnail(); ?>
                           </div>
                           <div class="swiper-slide__card-description">
                              <div class="swiper-slide__card-date">
                                 <img src="<?php bloginfo('template_url'); ?>/assets-europe/img/calendar.svg" />
                                 <div class="swiper-slide__card-date-text">
                                    <span>Опубликовано:</span>
                                    <span class="swiper-slide__card-date-text-bold"><?php the_date(); ?></span>
                                 </div>
                              </div>
                              <p class="swiper-slide__card-text">
                                 <?php the_title(); ?>
                              </p>
                           </div>
                        </div>
                     </a>
                  </div>
            <?php
               }
            } else {
               echo 'Записей не найдено.';
            }
            ?>


         </div>
         <div class="swiper-button-next"></div>
      </div>
      <button class="articles__btn">Увидеть все</button>
   </div>
</div>
<div class="line"></div>
<div class="container">
   <div class="recommendations">
      <div class="recommendations__title">
         <p>Советы по работе в Европе</p>
         <div class="recommendations__title-green"></div>
      </div>
      <div class="swiper-recommendations recommendations__list">
         <div class="swiper-button-prev"></div>
         <div class="swiper-wrapper">
            <div class="swiper-slide">
               <a class="swiper-slide__link" href="#">
                  <div class="swiper-slide__card">
                     <div class="swiper-slide__card-country"></div>
                     <div class="swiper-slide__card-flag">
                        <img src="<?php bloginfo('template_url'); ?>/assets-europe/img/flags/de.svg" />
                     </div>
                     <p class="swiper-slide__card-name">Германия</p>
                  </div>
               </a>
            </div>
            <div class="swiper-slide">
               <a class="swiper-slide__link" href="#">
                  <div class="swiper-slide__card">
                     <div class="swiper-slide__card-country"></div>
                     <div class="swiper-slide__card-flag">
                        <img src="<?php bloginfo('template_url'); ?>/assets-europe/img/flags/nl.svg" />
                     </div>
                     <p class="swiper-slide__card-name">Нидерланды</p>
                  </div>
               </a>
            </div>
            <div class="swiper-slide">
               <a class="swiper-slide__link" href="#">
                  <div class="swiper-slide__card">
                     <div class="swiper-slide__card-country"></div>
                     <div class="swiper-slide__card-flag">
                        <img src="<?php bloginfo('template_url'); ?>/assets-europe/img/flags/dk.svg" />
                     </div>
                     <p class="swiper-slide__card-name">Дания</p>
                  </div>
               </a>
            </div>
            <div class="swiper-slide">
               <a class="swiper-slide__link" href="#">
                  <div class="swiper-slide__card">
                     <div class="swiper-slide__card-country"></div>
                     <div class="swiper-slide__card-flag">
                        <img src="<?php bloginfo('template_url'); ?>/assets-europe/img/flags/pl.svg" />
                     </div>
                     <p class="swiper-slide__card-name">Польша</p>
                  </div>
               </a>
            </div>
            <div class="swiper-slide">
               <a class="swiper-slide__link" href="#">
                  <div class="swiper-slide__card">
                     <div class="swiper-slide__card-country"></div>
                     <div class="swiper-slide__card-flag">
                        <img src="<?php bloginfo('template_url'); ?>/assets-europe/img/flags/ch.svg" />
                     </div>
                     <p class="swiper-slide__card-name">Швейцария</p>
                  </div>
               </a>
            </div>
            <div class="swiper-slide">
               <a class="swiper-slide__link" href="#">
                  <div class="swiper-slide__card">
                     <div class="swiper-slide__card-country"></div>
                     <div class="swiper-slide__card-flag">
                        <img src="<?php bloginfo('template_url'); ?>/assets-europe/img/flags/pl.svg" />
                     </div>
                     <p class="swiper-slide__card-name">Польша</p>
                  </div>
               </a>
            </div>
            <div class="swiper-slide">
               <a class="swiper-slide__link" href="#">
                  <div class="swiper-slide__card">
                     <div class="swiper-slide__card-country"></div>
                     <div class="swiper-slide__card-flag">
                        <img src="<?php bloginfo('template_url'); ?>/assets-europe/img/flags/fr.svg" />
                     </div>
                     <p class="swiper-slide__card-name">Франция</p>
                  </div>
               </a>
            </div>
         </div>
         <div class="swiper-button-next"></div>
      </div>
      <button class="recommendations__btn">Увидеть все</button>
   </div>
</div>


<?php get_footer(); ?>