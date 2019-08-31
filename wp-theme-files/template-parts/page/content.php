<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post() ?>
    <div class="container">
      <article class="row justify-content-center">
        <section class="col">
          <?php the_content(); ?>

          <a href="<?php echo get_permalink(get_page_by_path("contact")) ?>"
             class="button">Contact Us</a>
        </section>
        <?php if (has_post_thumbnail()): ?>
          <div class="col-12 col-md-6 text-center">
            <img class="img-fluid featured-image" alt="<?php the_title() ?>"
                 src="<?php echo get_the_post_thumbnail_url($post, "large") ?>"/>
          </div>
        <?php endif ?>
      </article>
    </div>
  <?php endwhile; ?>
<?php endif; ?>

