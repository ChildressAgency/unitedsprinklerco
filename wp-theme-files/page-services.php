<?php get_header(); ?>

<?php get_template_part("template-parts/page/header") ?>

<?php get_template_part("template-parts/waves") ?>

<?php
$services = new WP_Query(array(
  'post_type' => 'service',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'order' => 'ASC'
));
?>

  <div id="content">
    <?php get_template_part("template-parts/page/content") ?>

    <h3 class="pt-5 pb-1 text-center">Our services</h3>

    <?php if ($services->have_posts()): ?>
      <div class="container">
        <div class="row services px-md-5 mx-md-5 justify-content-center">
          <?php while ($services->have_posts()): $services->the_post() ?>
            <a class="col-12 col-md-4 service text-center" href="<?php the_permalink() ?>">
              <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url() ?>"
                   alt="<?php echo get_the_title() ?>"/>
              <h4><?php the_title() ?></h4>
              <p>
                <?php echo get_field("summary") ?>
              </p>
            </a>
          <?php endwhile; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>

<?php get_template_part("template-parts/stripes/stripes") ?>

<?php get_template_part("template-parts/page/columns");

get_template_part("template-parts/testimonials/slider");

get_footer();
