<?php 
/**
 * Шаблон части советы по странам на главной
 */
?>
<div class="container">
   <div class="recommendations">
      <div class="recommendations__title">
         <p><?php echo __('советы по странам', 'europe'); ?></p>
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
                        <img src="<?php echo get_stylesheet_directory_uri() ?> /assets/img/flags/de.svg" />
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
                        <img src="<?php echo get_stylesheet_directory_uri() ?> /assets/img/flags/nl.svg" />
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
                        <img src="<?php echo get_stylesheet_directory_uri() ?> /assets/img/flags/dk.svg" />
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
                        <img src="<?php echo get_stylesheet_directory_uri() ?> /assets/img/flags/pl.svg" />
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
                        <img src="<?php echo get_stylesheet_directory_uri() ?> /assets/img/flags/ch.svg" />
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
                        <img src="<?php echo get_stylesheet_directory_uri() ?> /assets/img/flags/pl.svg" />
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
                        <img src="<?php echo get_stylesheet_directory_uri() ?> /assets/img/flags/fr.svg" />
                     </div>
                     <p class="swiper-slide__card-name">Франция</p>
                  </div>
               </a>
            </div>
         </div>
         <div class="swiper-button-next"></div>
      </div>
      <a class="recommendations__btn" href="<?php echo get_page_link(BLOG_PAGE_ID)?>"><?php echo __('Увидеть все', 'europe'); ?></a>
   </div>
</div>