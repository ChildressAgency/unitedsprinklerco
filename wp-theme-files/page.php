<?php get_header(); ?>

<?php get_template_part("template-parts/page/header") ?>

<?php get_template_part("template-parts/waves") ?>

  <div id="content">
    <?php get_template_part("template-parts/page/content") ?>
  </div>

<?php get_template_part("template-parts/stripes/stripes") ?>

<?php get_template_part("template-parts/page/columns");

get_template_part("template-parts/page/contact");

get_template_part("template-parts/testimonials/slider");

get_footer();
