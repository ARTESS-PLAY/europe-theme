<?php
/*
Template Name: Шаблон страницы вакансии
Template Post Type: page
*/


$query = get_vacansies();
$big = 999999999; // need an unlikely integer

get_header() ?>

<div class="search">
   <div class="container">
      <h1 class="search__text">
         <?php _e('Вакансии', 'europe'); ?><span class="text--green-1">.</span><span class="search__count">(<?php echo wp_count_posts('vacancies')->publish ?>)</span>
      </h1>
      <form action="<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"?>" method="get" class="search_form" id='search_form'>
         <input step="1" placeholder="<?php _e("Введите поисковый запрос, например, Сварщик Германия", 'europe'); ?>" type="text"
            class="filed search__filed" id='search_input' name='searchCountry' value="<?php echo esc_attr($_GET['searchCountry'])?>"/>
         <input type="hidden" name='searchCountryPrev' value="<?php echo esc_attr($_GET['searchCountry'])?>"/>
         <button class="button__filed" type="submit"></button>
      </form>
   </div>
</div>

<main class="vacancies">
   <div class="container">
      <div class="vacancies__up">
         <div id="open_filters_mob"></div>
         <p class="vacancies__text">
            <?php echo __('Количество подходящих вакансий:&nbsp;', 'europe'); ?><span class="vacancies__count"><?php echo $query->found_posts ?></span>.
         </p>
      </div>

      <div class="vacancies__content">
        
         <?php get_template_part('/template-parts/vacancies-filter')?>

         <div class="advertisments__list vacancies__advertisments">

            <?php
            if ($query->have_posts()): ?>

               <?php while ($query->have_posts()):  $query->the_post();?>
                     
                     <?php get_template_part('/template-parts/vacancy-card')?>

               <?php endwhile; ?>
               
               <?php wp_reset_postdata(); ?>

               <div class="advertisments__pagination pagination">

                  <?php
                  echo paginate_links(array(
                     'base'      => str_replace( $big, '%#%',  get_pagenum_link( $big, false )  ),
                     'format'    => '?paged=%#%',
                     'current'   => max( 1, get_query_var('paged') ),
                     'total'     =>  $query->max_num_pages,
                     'prev_text' => '',
                     'next_text' => '',
                     'show_all'  => false,
                     'end_size'  => 1,
                     'mid_size'  => 1,

                  ));
                  ?>
               </div>


            <?php endif;?>

         </div>
      </div>
   </div>
</main>

<?php get_footer() ?>