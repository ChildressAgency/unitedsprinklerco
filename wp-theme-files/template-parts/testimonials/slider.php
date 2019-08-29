<?php
$testimonials = new WP_Query(array(
  'post_type' => 'testimonial',
  'post_status' => 'publish',
  'posts_per_page' => -1
));
?>
<div class="testimonials-container">
  <div class="stripe darkgray">
    <div class="container">
      <div class="col-12">

        <div id="testimonials" class="carousel slide" data-ride="carousel">
          <?php if ($testimonials->have_posts()):
            $posts = $testimonials->get_posts(); ?>
            <ol class="carousel-indicators">
              <?php foreach ($posts as $i => $post): ?>
                <li data-target="#testimonials" data-slide-to="<?php echo $i ?>"
                    class="<?php if ($i === 0) echo "active" ?>"></li>
              <?php endforeach; ?>
            </ol>
            <div class="carousel-inner">

              <?php foreach ($posts as $i => $post): $testimonials->the_post(); ?>
                <div class="carousel-item <?php if ($i === 0) echo "active" ?>">
                  <?php get_template_part("template-parts/testimonials/single-slide"); ?>
                </div>
              <?php
              endforeach; ?>

              <a class="carousel-control-prev" href="#testimonials" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </a>
              <a class="carousel-control-next" href="#testimonials" role="button" data-slide="next">
                <span class="carousel-control-next-icon"></span>
              </a>

            </div>
          <?php endif; ?>
        </div>

      </div>
    </div>
  </div>
</div>