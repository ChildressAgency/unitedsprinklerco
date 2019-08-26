<footer class="top-footer text-center">
  <div>Experience + Expertise = Excellence</div>
</footer>

<footer class="navigation py-4">
  <div class="container py-4">
    <div class="row">

      <div class="col-12 col-md-6">
        <a href="<?php get_site_url() ?>">
          <img src="<?php echo get_template_directory_uri() ?>/img/logo-white.png" alt="Logo" class="img-fluid"/>
        </a>
      </div>

      <div class="col-12 col-md-6 d-flex flex-row justify-content-end align-items-center">
        <nav class="navbar navbar-expand-md navbar-dark">
          <?php wp_nav_menu(array(
            'theme_location' => 'nav-menu',
            'depth' => 2,
            'container' => 'div',
            'container_class' => 'collapse navbar-collapse justify-content-md-end',
            'container_id' => 'header-navbar',
            'menu_class' => 'nav navbar-nav',
            'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
            'walker' => new WP_Bootstrap_Navwalker(),
          )) ?>
        </nav>
      </div>

    </div>

    <div class="row justify-content-center text-center pt-5">
      <div class="col-12">
        <?php if (get_field("address", "option")) : ?>
          <div><?php echo get_field("address", "option") ?></div>
        <?php endif ?>
      </div>
      <div class="col-12">
        <?php if (get_field("phone", "option")) : ?>
          <span>Local <?php echo get_field("phone", "option") ?></span>
        <?php endif ?>
        <?php if (get_field("fax", "option")) : ?>
          &bullet; <span>Fax <?php echo get_field("fax", "option") ?></span>
        <?php endif ?>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
