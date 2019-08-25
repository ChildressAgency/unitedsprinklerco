<?php get_header(); ?>

<?php get_template_part("template-parts/waves") ?>

<?php if (have_posts()) :
  while (have_posts()) : the_post() ?>
    <article class="row">
      <h2 class="col-12 text-center"><?php the_title() ?></h2>

      <?php if (has_post_thumbnail()): ?>
        <img class="img-fluid col-12" alt="<?php the_title() ?>"
             src="<?php echo get_the_post_thumbnail_url($post, "large") ?>"/>
      <?php endif; ?>

      <section class="col-12">
        <?php the_content(); ?>
      </section>
    </article>
  <?php
  endwhile;
endif;

get_footer();
