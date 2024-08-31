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
                     <div class="vacancy__price"><?php the_field('vacancies_price'); ?></div>
                     <div class="vacancy__rate"><?php the_field('vacancies_currency'); ?></div>
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
                  <?php the_post_thumbnail('thumbnail'); ?>
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
               <?php the_content(); ?>
            </div>
         </div>
         <div class="application-wrapper">
            <div class="application">
               <p class="application__title"><?php echo __('Подавайте заявку сейчас', 'europe'); ?></p>
               <div>
                  <a class="application__link" href="#">
                     <button class="application__btn">
                        <img class="application__btn-img" src="<?php echo get_stylesheet_directory_uri() ?> /assets/img/arrow.svg" />
                        <span class="application__btn-text"><?php echo __('Отправить заявку', 'europe'); ?></span>
                     </button>
                  </a>
               </div>
               <button class="application__offer-btn"><?php echo __('Напечатать предложение'); ?></button>
            </div>
         </div>
      </div>
   </div>

   <div class="application-btn-fixed">
      <button class="application__btn">
            <img class="application__btn-img" src="<?php echo get_stylesheet_directory_uri() ?> /assets/img/arrow.svg" />
            <span class="application__btn-text"><?php echo __('Отправить заявку', 'europe'); ?></span>
      </button>
   </div>
   <div id="modal" class="modal">
      <div class="modal__content">
            <img class="modal__close-btn" src="<?php echo get_stylesheet_directory_uri() ?> /assets/img/close.svg" />
            <div class="modal__form">
               <p class="modal__title"><?php echo __('Отправить заявку', 'europe'); ?></p>
               <form class="modal__form-content" id='modal-leed'>
                  <div class="modal__field">
                        <label class="modal__label" for="name"><?php echo __('Имя:', 'europe'); ?></label>
                        <input class="modal__input" type="text" placeholder="Иван Иванов" id="name" name="name" required>
                  </div>
                  <div class="modal__field">
                        <label class="modal__label" for="email"><?php echo __('Email:', 'europe'); ?></label>
                        <input class="modal__input" type="email" placeholder="example@gmail.com" id="email" name="email" required>
                  </div>
                  <?php wp_nonce_field('send_leed', '_send_leed_nonce')?>
                  <button class="application__btn" type="submit">
                        <img class="application__btn-img" src="<?php echo get_stylesheet_directory_uri() ?> /assets/img/arrow.svg" />
                        <span class="application__btn-text"><?php echo __('Отправить', 'europe'); ?></span>
                  </button>
               </form>
            </div>
      </div>
   </div>
   <div id="modal_thx"  class="modal">
      <div class="modal__content modal__tnx">
         <p><?php _e('Спасибо! Мы скоро с Вами свяжемся.')?></p>
      </div>
   </div>
</div>
<?php get_footer() ?>