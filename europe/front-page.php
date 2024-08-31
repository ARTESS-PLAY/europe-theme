<?php
/*
Template Name: Шаблон главной страницы
Template Post Type: page
*/
get_header();
?>

<div class="wrapper" style="background-image:url(<?php the_field('main_img'); ?>">
   <div class="wrapper__arrows">
      <img src="<?php echo get_stylesheet_directory_uri() ?> /assets/img/arrow-1.png" class="arrow-1" />
      <img src="<?php echo get_stylesheet_directory_uri() ?> /assets/img/arrow-2.png" class="arrow-2" />
   </div>
   <div class="wrapper__search">
      <div class="wrapper__search-text">
         <?php the_field('main_text'); ?>
      </div>
      <?php get_search_form(); ?>
   </div>
   <?php get_template_part('template-parts/main-country-slider')?>
</div>

<?php get_template_part('template-parts/main-articles-slider')?>
<div class="line"></div>
<?php get_template_part('template-parts/main-help-articles-slider')?>


<?php get_footer(); ?>