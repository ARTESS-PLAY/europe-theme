<?php
get_header(); ?>
<div class="container">
	<?php while (have_posts()) {
		the_post(); ?>
		<?php the_content(); ?>
	<?php } ?>
	<?php if (! have_posts()) { ?>
		Записей нет.
	<?php } ?>
</div>
<?php get_footer();
