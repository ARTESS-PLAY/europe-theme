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

            <?php foreach (get_all_counties() as $term): ?>
                <div class="swiper-slide">
                    <a class="swiper-slide__link" href="<?php echo get_help_blog_page() . "?countries=" . json_encode([$term->term_id])?>">
                        <div class="swiper-slide__card">
                            <div class="swiper-slide__card-country"></div>
                            <div class="swiper-slide__card-flag">
                                <img src="<?php echo get_field('tax_icon', $term->taxonomy . '_' . $term->term_id)?>" alt="<?php echo esc_html($term->name); ?>"/>
                            </div>
                            <p class="swiper-slide__card-name"><?php echo esc_html($term->name); ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach;?>

         </div>
         <div class="swiper-button-next"></div>
      </div>
      <a class="recommendations__btn" href="<?php echo get_help_blog_page()?>"><?php echo __('Увидеть все', 'europe'); ?></a>
   </div>
</div>