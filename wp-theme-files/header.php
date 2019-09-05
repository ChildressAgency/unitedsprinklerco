<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo get_bloginfo('name');
    if (get_bloginfo('description')): echo ' | ' . get_bloginfo('description'); endif; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://use.typekit.net/lrf4jzs.css">
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
        <a class="quote" href="<?php echo get_permalink(get_page_by_path("contact")) ?>">Request a quote</a>
      </div>

      <?php if (get_field("phone", "option")): ?>
        <div class="col-12 col-md-4 phone text-right">
          <span>24/7</span>
          <a href="tel:<?php echo get_field("phone", "option") ?>"><?php echo get_field("phone", "option") ?></a>
        </div>
      <?php endif ?>
    </div>
  </div>
</header>

<header class="navigation my-2">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-9 col-md-6">
        <?php if (has_custom_logo()) the_custom_logo() ?>
      </div>

      <div class="col-3 d-flex d-md-none navbar-light justify-content-center align-items-center">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header-navbar">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>

      <div class="col-12 col-md-6">
        <div class="social-icons text-center text-md-right pr-md-4 pt-2">
          <?php if (get_field("facebook", "option")) : ?>
            <a href="<?php echo get_field("facebook", "option") ?>">
              <i class="fab fa-facebook-square"></i>
            </a>
          <?php endif ?>
          <?php if (get_field("twitter", "option")) : ?>
            <a href="<?php echo get_field("twitter", "option") ?>">
              <i class="fab fa-twitter-square"></i>
            </a>
          <?php endif ?>
          <?php if (get_field("linkedin", "option")) : ?>
            <a href="<?php echo get_field("linkedin", "option") ?>">
              <i class="fab fa-linkedin"></i>
            </a>
          <?php endif ?>
          <?php if (get_field("instagram", "option")) : ?>
            <a href="<?php echo get_field("instagram", "option") ?>">
              <i class="fab fa-instagram"></i>
            </a>
          <?php endif ?>
        </div>

        <nav class="navbar navbar-expand-md navbar-light pt-1">
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
