<?php if (have_posts()) : ?>
  <div id="content">
    <?php while (have_posts()) : the_post() ?>
      <div class="container">
        <article class="row justify-content-center">
          <section class="col-12 col-md-8 text-center">
            <?php the_content(); ?>
          </section>
        </article>
      </div>
    <?php endwhile; ?>
  </div>
<?php endif; ?>

