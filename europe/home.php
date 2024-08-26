<?php
/*
Template Name: Шаблон страницы блога
Template Post Type: page
*/
get_header(); ?>
<div class="container">
	<div class="articles">
		<div class="articles__title">
			<p>Блог</p>
			<div class="articles__title-green"></div>
		</div>
		<div class="swiper-articles articles__list">
			<div class="swiper-button-prev"></div>
			<div class="swiper-wrapper">
				<?php
				$args = array(
					'posts_per_page' => -1,
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
	</div>
</div>
<?php get_footer();
