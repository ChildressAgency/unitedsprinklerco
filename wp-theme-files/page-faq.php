<?php get_header(); ?>

<?php get_template_part("template-parts/page/header") ?>

<?php get_template_part("template-parts/waves") ?>

<?php
$faqs = new WP_Query(array(
  'post_type' => 'faq',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'order' => 'ASC'
));
?>

  <div id="content">
    <div class="container">
      <div class="row justify-content-center">
        <section class="col-12 col-md-8 text-center">
          <h3>FAQ</h3>

          <?php if ($faqs->have_posts()): ?>
            <div id="accordion" class="mt-3 mb-5 text-left">
              <?php while ($faqs->have_posts()): $faqs->the_post() ?>
                <?php get_template_part("template-parts/accordion/item") ?>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>

          <h3 class="p-5">Didn't find your answer? Contact us today, and we'll answer any further questions you
            have.</h3>

          <a href="<?php echo get_permalink(get_page_by_path("contact")) ?>"
             class="button">Contact Us</a>
        </section>
      </div>
    </div>
  </div>

<?php get_template_part("template-parts/page/columns");

get_template_part("template-parts/testimonials/slider");

get_footer();
