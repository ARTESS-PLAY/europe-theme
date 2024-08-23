<!DOCTYPE html>
<html lang="en">

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
               <a class="header__link" href="/">
                  <img src="<?php bloginfo('template_url') ?>/assets-europe/img/logo-full.svg" alt="Logo" class="logo-desk" />
                  <img src="<?php bloginfo('template_url') ?>/assets-europe/img/flag.svg" alt="Logo" class="logo-mob" />
               </a>
            </div>

            <?php
            wp_nav_menu([
               'theme_location'  => 'top',
               'container'       => false,
               'echo'            => true,
               'items_wrap'      => '%3$s',
            ]);
            ?>

            <div class="burger_menu" id="open_mob_menu">
               <span></span>
               <span></span>
               <span></span>
            </div>
         </div>
      </div>
   </header>