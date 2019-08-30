<?php get_header(); ?>

<?php get_template_part("template-parts/page/header") ?>

<?php get_template_part("template-parts/waves") ?>

<?php get_template_part("template-parts/stripes/stripes") ?>

<?php if (have_posts()) :
  while (have_posts()) : the_post() ?>
    <article class="row">
      <section class="col-12">
        <?php the_content(); ?>
      </section>
    </article>
  <?php
  endwhile;
endif; ?>

<?php if (have_rows("columns")): ?>
  <div class="footer-columns"
       style="background-image: url('<?php echo get_field("background_image")["sizes"]["large"] ?>')">
    <div class="backdrop">
      <div class="container">
        <div class="row text-center">
          <?php while (have_rows("columns")): the_row() ?>
            <div class="col-12 col-md-4">
              <h3 class="text-center"><?php echo get_sub_field("title") ?></h3>
              <div><?php echo get_sub_field("body") ?></div>
            </div>
          <?php endwhile ?>
        </div>
      </div>
    </div>
  </div>
<?php endif;

get_template_part("template-parts/testimonials/slider");

get_footer();
