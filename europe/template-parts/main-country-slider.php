<?php 
/**
 * Выводить часть для слайдера стран на главной
 */
?>

<div class="wrapper__slider">
    <p class="wrapper__slider-title"><?php the_field('main_country-title') ?></p>
    <div class="swiper wrapper__slider-carousel">
        <div class="swiper-button-prev"></div>
        <div class="swiper-wrapper">

            <?php foreach (get_all_counties() as $term): ?>
                <div class="swiper-slide">
                    <a class="swiper-slide__link" href="<?php echo get_vacansies_link_page() . "?countries=" . json_encode([$term->term_id])?>">
                        <div class="flag-wrapper-tooltip">
                        <div class="flag-wrapper">
                            <img
                                class="flag-wrapper__img"
                                alt="<?php echo esc_html($term->name); ?>"
                                width="48"
                                height="48"
                                src="<?php echo get_field('tax_icon', $term->taxonomy . '_' . $term->term_id)?>" />

                        </div>

                        <div class="tooltip">
                            <span class="tooltip__text"><?php echo __('Вакансии - ', 'europe') ?><?php echo esc_html($term->name); ?></span>
                        </div>

                        </div>
                        <p class="country-name"><?php echo esc_html($term->name); ?></p>
                    </a>
                </div>
            <?php endforeach;?>
        
        </div>
        <div class="swiper-button-next"></div>
    </div>
</div>