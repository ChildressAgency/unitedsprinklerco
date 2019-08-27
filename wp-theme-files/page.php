<?php get_header(); ?>

<?php get_template_part("template-parts/waves") ?>

<?php get_template_part("template-parts/stripes/stripes") ?>

<?php if (have_posts()) :
  while (have_posts()) : the_post() ?>
    <article class="row">
      <section class="col-12">
        <?php the_content(); ?>
      </section>
    </article>
  <?php
  endwhile;
endif;

get_footer();
