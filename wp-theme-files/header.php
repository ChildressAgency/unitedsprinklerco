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
  <?php
  $email = "info@unitedsprinklers.com"; //TODO: custom fields
  $phone = "540.659.4675";
  ?>
  <div class="container">
    <div class="row">
      <div class="col-4 email">
        <a href="mailto:<?php echo $email ?>"><?php echo $email ?></a>
      </div>

      <div class="col-4 text-center">
        <a class="quote" href="#">Request a quote</a>
      </div>

      <div class="col-4 phone text-right">
        <span>24/7</span>
        <?php echo $phone ?>
      </div>
    </div>
  </div>
</header>
<header>
  header.
</header>
