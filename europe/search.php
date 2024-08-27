<?php

get_header(); ?>
<div>
	<div class="blue-bg">
		<div class="blue-bg__animation-block">
			<div class="blue-bg__animation-block-img-1"></div>
			<div class="blue-bg__animation-block-img-2"></div>
		</div>
		<div class="blue-bg__block"></div>
		<div class="blue-bg__text">
			<p class="blue-bg__contact"><?php echo __('Результаты поиска на :', 'europe'); ?> <?php echo get_search_query(); ?></p>
			<div class="blue-bg__contact-circle"></div>
		</div>
	</div>

	<div class="container">
		<div class="articles">
			<div class="articles__title">
			</div>
			<div class="swiper-articles articles__list">
				<div class="swiper-button-prev"></div>
				<div class="swiper-wrapper">

					<?php if (have_posts()) : ?>
						<?php while (have_posts()) : the_post(); ?>
							<div class="swiper-slide">
								<a class="swiper-slide__link" href=<?php the_permalink(); ?>>
									<div class="swiper-slide__card">
										<div class="swiper-slide__card-img">
											<?php the_post_thumbnail([250, 250]); ?>
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
							<div class="swiper-button-next"></div>
						<?php endwhile; ?>
					<?php else : ?>
						<p><?php echo __('Записей не найдено', 'europe'); ?></p>
					<?php endif; ?>

				</div>
				<div class="swiper-button-next"></div>
			</div>
		</div>
	</div>
</div>
<?php get_footer();
