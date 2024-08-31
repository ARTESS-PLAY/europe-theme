<?php 
/**
 * Слайдер на главной для вывода статей
 */
?>

<div class="container">
   <div class="articles">
      <div class="articles__title">
         <p><?php echo __('Последние статьи', 'europe'); ?></p>
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

            $query = new WP_Query($args); ?>

            <?php if ($query->have_posts()): ?>
               <?php while ($query->have_posts()): ?>
                  <?php $query->the_post(); ?>
            
                  <div class="swiper-slide">
                     <a class="swiper-slide__link" href=<?php the_permalink(); ?>>
                        <div class="swiper-slide__card">
                           <div class="swiper-slide__card-img">
                              <?php the_post_thumbnail(); ?>
                           </div>
                           <div class="swiper-slide__card-description">
                              <div class="swiper-slide__card-date">
                                 <img src="<?php echo get_stylesheet_directory_uri() ?> /assets/img/calendar.svg" />
                                 <div class="swiper-slide__card-date-text">
                                    <span><?php echo __('Опубликовано:', 'europe'); ?></span>
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
               <?php endwhile;?>
            <?php else:?>
               <p><?php echo __('Записей не найдено', 'europe'); ?></p>
            <?php endif;?>
         </div>
         <div class="swiper-button-next"></div>
      </div>
      <a class="articles__btn" href="<?php echo get_help_blog_page()?>"><?php echo __('Увидеть все', 'europe'); ?></a>
   </div>
</div>