<?php
/**
 * Шаблон карточки вакансии
 */

global $post;

$country = get_countries_for_post($post->id)[0];
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
                <?php  '<p class="advertisment__info__company">' . get_the_excerpt() . '</p>'; ?>
                <p class="advertisment__info__date">
                    <?php the_date('F j, Y'); ?>
                </p>
            </div>
        </div>
        <div class="advertisment__location">

            <div class="advertisment__location__county">
                <?php if($country): ?>
                    <div class="advertisment__location__county__flag">
                        <img src="<?php echo get_field('tax_icon', $country->taxonomy . '_' . $country->term_id)?>" 
                             alt="<?php echo $country->name?>"/>
                    </div>
                    <p class="advertisment__location__county__name">
                        <span><?php echo $country->name ?></span> 
                        <span><?php echo get_field('tax_city', $country->taxonomy . '_' . $country->term_id) ? ', ' . get_field('tax_city', $country->taxonomy . '_' . $country->term_id): ''?></span>
                    </p>
                <?php endif;?>
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

                        <?php if(get_sub_field('vacancies_repeater_req-text')):?>

                            <div class="vacancy__requirement-tooltip">
                                <div class="tooltip-content">
                                <p class="tooltip-text">
                                    <?php the_sub_field('vacancies_repeater_req-text'); ?>
                                </div>
                                </p>
                            </div>

                        <?php endif;?>

                    </div>


                    <?php endwhile; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
    </a>
</article>