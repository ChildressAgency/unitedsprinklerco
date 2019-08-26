<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo get_bloginfo('name');
    if (get_bloginfo('description')): echo ' | ' . get_bloginfo('description'); endif; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <?php wp_head(); ?>
</head>
<body>

<header class="contact">
  <div class="container">
    <div class="row">
      <?php if (get_field("email", "option")): ?>
        <div class="col-12 col-md-4 email">
          <a href="mailto:<?php echo get_field("email", "option") ?>">
            <?php echo get_field("email", "option") ?>
          </a>
        </div>
      <?php endif ?>

      <div class="col-12 col-md-4 text-center">
        <a class="quote" href="#">Request a quote</a>
      </div>

      <?php if (get_field("phone", "option")): ?>
        <div class="col-12 col-md-4 phone text-right">
          <span>24/7</span>
          <?php echo get_field("phone", "option") ?>
        </div>
      <?php endif ?>
    </div>
  </div>
</header>

<header class="navigation my-2">
  <div class="container">
    <div class="row">
      <div class="col-9 col-md-6">
        <?php if (has_custom_logo()) the_custom_logo() ?>
      </div>

      <div class="col-3 d-flex d-md-none navbar-light justify-content-center align-items-center">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header-navbar">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>

      <div class="col-12 col-md-6">
        <nav class="navbar navbar-expand-md navbar-light">
          <?php
          wp_nav_menu(array(
            'theme_location' => 'nav-menu',
            'depth' => 2,
            'container' => 'div',
            'container_class' => 'collapse navbar-collapse justify-content-md-end',
            'container_id' => 'header-navbar',
            'menu_class' => 'nav navbar-nav',
            'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
            'walker' => new WP_Bootstrap_Navwalker(),
          ));
          ?>
        </nav>
      </div>
    </div>
  </div>
</header>
