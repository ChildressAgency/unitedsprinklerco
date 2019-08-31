<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post() ?>
    <div class="container">
      <article class="row justify-content-center">
        <section class="col text-center text-md-left">
          <?php if (get_field("icon")): ?>
            <img class="img-fluid" src="<?php echo get_field("icon") ?>" alt="<?php echo get_the_title() ?>"/>
            <h3 class="pt-3"><?php the_title() ?></h3>
          <?php endif ?>
          <?php the_content(); ?>

          <a href="<?php echo get_permalink(get_page_by_path("contact")) ?>"
             class="button">Contact Us</a>
        </section>
        <?php if (has_post_thumbnail()): ?>
          <div class="col-12 col-md-6 text-center order-first order-md-last">
            <img class="img-fluid featured-image my-2" alt="<?php the_title() ?>"
                 src="<?php echo get_the_post_thumbnail_url($post, "large") ?>"/>
          </div>
        <?php endif ?>
      </article>
    </div>
  <?php endwhile; ?>
<?php endif; ?>

