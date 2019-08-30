<?php get_header(); ?>

<?php get_template_part("template-parts/page/header") ?>

<?php get_template_part("template-parts/waves") ?>

<?php
if (have_posts()) {
  the_post();
  $title = get_the_title();
  $content = get_the_content();
}

$faqs = new WP_Query(array(
  'post_type' => 'faq',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'order' => 'ASC'
));
?>

<?php get_template_part("template-parts/stripes/stripes") ?>

  <div id="content">
    <div class="container">
      <article class="row justify-content-center">
        <section class="col-12 col-md-8 text-center">
          <?php echo $title ?>

          <?php if ($faqs->have_posts()): ?>
            <div id="accordion" class="mt-3 mb-5 text-left">
              <?php while ($faqs->have_posts()): $faqs->the_post() ?>
                <?php get_template_part("template-parts/accordion/item") ?>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>

          <?php echo $content ?>

          <a href="<?php echo get_permalink(get_page_by_path("contact")) ?>"
             class="button">Contact Us</a>
        </section>
      </article>
    </div>
  </div>

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
