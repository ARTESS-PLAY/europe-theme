<?php
/*
Template Name: Шаблон страницы контакты
Template Post Type: page
*/
get_header(); ?>
<div>
   <div class="blue-bg">
      <div class="blue-bg__animation-block">
         <div class="blue-bg__animation-block-img-1"></div>
         <div class="blue-bg__animation-block-img-2"></div>
      </div>
      <div class="blue-bg__block"></div>
      <div class="blue-bg__text">
         <p class="blue-bg__contact">Контакт</p>
         <div class="blue-bg__contact-circle"></div>
      </div>
   </div>

   <div class="contacts">
      <div class="contacts__title"><?php the_field('contacts_title'); ?></div>
      <div class="contacts__cols">
         <div class="contacts__article">
            <img class="contacts__article-img" src="<?php bloginfo('template_url'); ?>/assets-europe/img/mail.svg" />
            <div>
               <p class="contacts__article-title">E-mail:
                  <a href="mailto:<?php the_field('contacts_title'); ?>" class="email"><?php the_field('contacts_mail'); ?></a>
               </p>

               <?php if (get_field('contacts_repeater-info')): ?>
                  <?php while (has_sub_field('contacts_repeater')): ?>
                     <p class="contacts__article-text">
                        <?php the_sub_field('contacts_repeater-info'); ?>
                        <a href="mailto<?php the_sub_field('contacts_repeater-info'); ?>" class="email"><?php the_sub_field('contacts_repeater-link'); ?></a>
                     </p>
                  <?php endwhile; ?>
               <?php endif; ?>

            </div>
         </div>
         <div class="contacts__article">
            <img class="contacts__article-img" src="<?php bloginfo('template_url'); ?>/assets-europe/img/location.svg" />
            <div class="contacts__article-col">
               <div>
                  <p class="contacts__article-title">Адрес:</p>
                  <p class="contacts__article-text"><?php the_field('contacts_adress'); ?></p>
               </div>
               <div>
                  <p class="contacts__article-title">Рабочие часы:</p>
                  <p class="contacts__article-text"><?php the_field('contacts_time'); ?></p>
               </div>
               <div>

                  <?php if (get_field('contacts_repeater')): ?>
                     <?php while (has_sub_field('contacts_repeater_2')): ?>
                        <p class="contacts__article-text"><?php the_sub_field('contacts_repeater_2-name'); ?></p>
                     <?php endwhile; ?>
                  <?php endif; ?>

               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php get_footer(); ?>