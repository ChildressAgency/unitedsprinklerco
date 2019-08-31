<?php get_header(); ?>

<?php get_template_part("template-parts/page/header") ?>

<?php get_template_part("template-parts/waves") ?>

<?php

$jobs = new WP_Query(array(
  'post_type' => 'job',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'order' => 'ASC'
));
?>

  <div id="content">
    <?php get_template_part("template-parts/page/content", "contact") ?>

    <div class="container">
      <div class="row justify-content-center">
        <section class="col-12 col-md-8 text-center">
          <h3 class="pt-5 pb-1">Current Jobs</h3>

          <?php if ($jobs->have_posts()): ?>
            <div id="accordion" class="mt-3 mb-5 text-left">
              <?php while ($jobs->have_posts()): $jobs->the_post() ?>
                <div class="card">
                  <div class="card-header text-left" id="title_<?php the_ID() ?>">
                    <h5 class="mb-0">
                      <button class="btn btn-link" data-toggle="collapse" data-target="#item_<?php the_ID() ?>">
                        <?php the_title() ?>
                      </button>
                    </h5>
                  </div>

                  <div id="item_<?php the_ID() ?>" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                      <?php the_content() ?>

                      <a class="button" href="mailto:<?php echo get_field("email", "options") ?>">Apply Now</a>
                    </div>
                  </div>
                </div>

              <?php endwhile; ?>
            </div>
          <?php endif; ?>
        </section>
      </div>
    </div>
  </div>

<?php get_template_part("template-parts/page/columns");

get_template_part("template-parts/testimonials/slider");

get_footer();
