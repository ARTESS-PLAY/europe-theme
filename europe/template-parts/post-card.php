<?php
/**
 * Шаблон карточки записи
 */

global $post;
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
        </div>
    </a>
</article>