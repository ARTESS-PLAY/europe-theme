<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">

<head>
   <meta charset="<?php bloginfo('charset') ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <?php wp_head(); ?>
   <title><?php the_title(); ?></title>
</head>

<body>
   <header>
      <div class="container">
         <div class="header">
            <div class="img header__img">
               <a class="header__link" href="<?php echo get_home_url(); ?>">
                  <img src="<?php the_field('header_logo', 'option'); ?>" alt="Logo" class="logo-desk" />
                  <img src="<?php the_field('header_logo-mobile', 'option'); ?>" alt="Logo" class="logo-mob" />
               </a>
            </div>
            <?php
               $menu = strip_tags(wp_nav_menu([
                  'theme_location'  => 'header_menu',
                  'container_class' => 'navigation header__navigation',
                  'container'       => 'nav',
                  'echo'            => false,
                  'items_wrap'      => '%3$s',
               ]), '<a><nav>' );
               echo str_replace("<a" ,'<a class="link link--blue"', $menu);
            ?>
            <div class="burger_menu" id="open_mob_menu">
               <span></span>
               <span></span>
               <span></span>
            </div>


         </div>
      </div>
   </header>