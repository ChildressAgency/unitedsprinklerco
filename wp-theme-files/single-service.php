<?php get_header(); ?>

<?php get_template_part("template-parts/page/header") ?>

<?php get_template_part("template-parts/waves") ?>

  <div id="content" class="single-service wide">
<?php get_template_part("template-parts/page/content", "contact") ?>

<?php
$currentID = get_the_ID();
$services = new WP_Query(array(
  'post_type' => 'service',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'order' => 'ASC'
));
?>

<?php if ($services->have_posts()): ?>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 text-center">
        <h3 class="pb-2">More Services</h3>
      </div>

      <?php while ($services->have_posts()): $services->the_post() ?>
        <?php if (get_the_ID() != $currentID): ?>
          <a class="col-12 col-md-3 service text-center pt-2" href="<?php the_permalink() ?>">
            <img class="img-fluid" src="<?php echo get_field("icon") ?>"
                 alt="<?php echo get_the_title() ?>"/>
            <h4 class="pt-2"><?php the_title() ?></h4>
          </a>
        <?php endif; ?>
      <?php endwhile; ?>
    </div>
  </div>
  </div>
<?php endif; ?>

  </div>

<?php get_template_part("template-parts/stripes/stripes") ?>

<?php get_template_part("template-parts/page/columns");

get_template_part("template-parts/testimonials/slider");

get_footer();
