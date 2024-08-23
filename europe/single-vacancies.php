<?php
/*
Template Name: Шаблон вакансии
Template Post Type: vacancies
*/

get_header() ?>
<div>
   <div class="blue-bg"></div>
   <div class="wrapper">
      <div class="wrapper-grid">
         <div class="vacancy">
            <div class="vacancy__card card">
               <div class="vacancy__info">
                  <div class="vacancy__title">
                     <?php the_title(); ?>
                  </div>
                  <div class="vacancy__payment">
                     <?php the_excerpt(); ?>
                  </div>
               </div>
               <div class="vacancy__open">
                  <div class="vacancy__conditions">
                     <?php if (get_field('vacancies_repeater')): ?>
                        <?php while (has_sub_field('vacancies_repeater')): ?>
                           <p class="contacts__article-text"><?php the_sub_field('vacancies_repeater-name'); ?></p>

                           <p class="vacancy__condition">
                              <span class="vacancy__condition-title"><?php the_sub_field('vacancies_repeater-title'); ?></span>
                              <span class="vacancy__condition-note"><?php the_sub_field('vacancies_repeater-text'); ?></span>
                           </p>

                        <?php endwhile; ?>
                     <?php endif; ?>

                  </div>
                  <div class="vacancy__image" style="
                                        background-image: url('<?php bloginfo('template_url'); ?>/assets-europe/img/b1e95fe74f536b55d88c08a282ec7b5c.jpg');
                                    "></div>
               </div>
            </div>
            <div class="vacancy__requirements card">
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
            <div class="vacancy__description card">
               <p class="vacancy__description-title">Описание вакансии</p>
               <?php the_content(); ?>
            </div>
         </div>
         <div class="application-wrapper">
            <div class="application">
               <p class="application__title">Подавайте заявку сейчас</p>
               <div>
                  <a class="application__link" href="#">
                     <button class="application__btn">
                        <img class="application__btn-img" src="<?php bloginfo('template_url'); ?>/assets-europe/img/arrow.svg" />
                        <span class="application__btn-text">Отправить заявку</span>
                     </button>
                  </a>
               </div>
               <button class="application__offer-btn">Напечатать предложение</button>
            </div>
         </div>
      </div>
   </div>
   <div class="application-btn-fixed">
      <a class="application__link" href="#">
         <button class="application__btn">
            <img class="application__btn-img" src="<?php bloginfo('template_url'); ?>/assets-europe/img/arrow.svg" />
            <span class="application__btn-text">Отправить заявку</span>
         </button>
   </div>
</div>
<div class="application-btn-fixed">
   <a class="application__link" href="#">
      <button class="application__btn">
         <img class="application__btn-img" src="<?php bloginfo('template_url'); ?>/assets-europe/img/arrow.svg" />
         <span class="application__btn-text">Отправить заявку</span>
      </button>
   </a>
</div>
</div>
<?php get_footer() ?>