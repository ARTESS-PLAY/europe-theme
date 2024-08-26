<footer class="footer-wrapper">
	<div class="footer">
		<div class="footer__grid">
			<div class="footer__title">
				<p class="footer__title-name"><?php the_field('footer_column-1_title', 'option'); ?></p>
				<div class="footer__circle"></div>
			</div>
			<ul class="footer__menu">
				<?php
				wp_nav_menu([
					'theme_location'  => 'footer_menu',
					'container'       => false,
					'echo'            => true,
					'items_wrap'      => '%3$s',
				]);
				?>
			</ul>

		</div>
		<div class="footer__grid">
			<div class="footer__title">
				<p class="footer__title-name"><?php the_field('footer_column-2_title', 'option'); ?></p>
				<div class="footer__circle"></div>
			</div>

			<?php if (get_field('footer_column_2_repeater', 'option')): ?>
				<?php while (has_sub_field('footer_column_2_repeater', 'option')): ?>
					<a class="footer__link" href="<?php the_sub_field('footer_column_2_repeater-link', 'option'); ?>"><?php the_sub_field('footer_column_2_repeater-name', 'option'); ?></a>
				<?php endwhile; ?>
			<?php endif; ?>

		</div>
		<div class="footer__grid">
			<div class="footer__title">
				<p class="footer__title-name"><?php the_field('footer_column-3_title', 'option'); ?></p>
				<div class="footer__circle"></div>
			</div>

			<?php if (get_field('footer_column_3_repeater', 'option')): ?>
				<?php while (has_sub_field('footer_column_3_repeater', 'option')): ?>
					<a class="footer__link" href="<?php the_sub_field('footer_column_3_repeater-link', 'option'); ?>"><?php the_sub_field('footer_column_3_repeater-name', 'option'); ?></a>
				<?php endwhile; ?>
			<?php endif; ?>

		</div>
		<div class="footer__grid">
			<div class="footer__title">
				<p class="footer__title-name"><?php the_field('footer_column-4_title', 'option'); ?></p>
				<div class="footer__circle"></div>
			</div>

			<?php if (get_field('footer_column_4_repeater', 'option')): ?>
				<?php while (has_sub_field('footer_column_4_repeater', 'option')): ?>
					<a class="footer__link" href="<?php the_sub_field('footer_column_4_repeater-link', 'option'); ?>"><?php the_sub_field('footer_column_4_repeater-name', 'option'); ?></a>
				<?php endwhile; ?>
			<?php endif; ?>

		</div>
	</div>
	<div class="links-wrapper">
		<div class="links">
			<div class="links__list">

				<?php if (get_field('footer_social_repeater', 'option')): ?>
					<?php while (has_sub_field('footer_social_repeater', 'option')): ?>
						<a href="<?php the_sub_field('footer_social_repeater-link', 'option'); ?>"><img src="<?php the_sub_field('footer_social_repeater-img', 'option'); ?>" /></a>
					<?php endwhile; ?>
				<?php endif; ?>

			</div>
			<div class="links__rights">
				<span class="links__copyright">© Copyright 2014-<?php echo date('Y'); ?></span>
				<span class=""><?php the_field('footer_column-1_title', 'option'); ?></span>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>

</html>