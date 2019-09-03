<?php
get_header();

$services = new WP_Query(array(
  'post_type' => 'service',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'order' => 'ASC'
));
?>

  <div class="stripe page-header front-page-header">
    <div class="container-fluid">
      <div class="row image" style="background-image: url('<?php echo get_field("hero_image")["sizes"]["large"] ?>')">
        <div class="col-12 col-md-6 image">
          <div class="text backdrop align-items-center justify-content-end flex-row d-flex">
            <div>
              <p class="text-left heading">
                <?php echo get_field("header_title") ?>
              </p>
              <p class="text-left body">
                <?php echo get_field("header_text") ?>
              </p>
              <a class="button" href="<?php echo get_permalink(get_page_by_path("contact")) ?>">Request a Quote</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="page-title container-fluid">
    <div class="row">
      <div class="col-12 text-center">
        <h1><?php echo get_field("page_title") ?></h1>
      </div>
    </div>
  </div>

<?php get_template_part("template-parts/waves") ?>

  <div id="content">
    <?php get_template_part("template-parts/page/content") ?>

    <?php if ($services->have_posts()): ?>
      <div class="container-fluid">
        <div class="row services front-page-services px-md-5 mx-md-5 justify-content-center align-items-start">
          <?php while ($services->have_posts()): $services->the_post() ?>
            <a class="col-12 col-md service text-center" href="<?php the_permalink() ?>">
              <img class="img-fluid" src="<?php echo get_field("icon") ?>"
                   alt="<?php echo get_the_title() ?>"/>
              <h4 class="pt-2"><?php the_title() ?></h4>
              <p class="pt-3">
                <?php echo get_field("summary") ?>
              </p>
            </a>
          <?php endwhile; ?>
        </div>
        <div class="row">
          <div class="col-12 text-center">
            <a class="button" href="<?php echo get_permalink(get_page_by_path("services")) ?>">Services</a>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>

<?php get_template_part("template-parts/stripes/stripes") ?>

<?php get_template_part("template-parts/page/columns");

get_template_part("template-parts/page/contact");

get_template_part("template-parts/testimonials/slider");

get_footer();
