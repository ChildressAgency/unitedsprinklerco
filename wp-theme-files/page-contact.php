<?php get_header(); ?>

<?php get_template_part("template-parts/page/header") ?>

<?php get_template_part("template-parts/waves") ?>

  <div id="content" class="contact-page pb-5">
    <div class="container text-center text-md-left">

      <div class="row justify-content-center py-4">
        <div class="col-10 col-md-6 contact-item">
          <div class="contact-icon">
            <img src="<?php echo get_template_directory_uri() ?>/img/contact_phone.png" alt="Call Us"/>
          </div>
          <div>
            <h3 class="pb-2">Call Us</h3>
            <h2><?php echo get_field("phone", "options") ?></h2>
          </div>
        </div>
      </div>

      <div class="row justify-content-center py-4">
        <div class="col-10 col-md-6 contact-item">
          <div class="contact-icon">
            <img src="<?php echo get_template_directory_uri() ?>/img/contact_address.png" alt="Find Us"/>
          </div>
          <div>
            <h3 class="pb-2">Find Us</h3>
            <h2><?php echo get_field("address", "options") ?></h2>
          </div>
        </div>
      </div>

      <div class="row justify-content-center py-4">
        <div class="col-10 col-md-6 contact-item">
          <div class="contact-icon w-100">
            <img src="<?php echo get_template_directory_uri() ?>/img/contact_email.png" alt="Email Us"/>
          </div>
          <div>
            <h3 class="pb-2">Email Us</h3>
            <h2><?php echo get_field("email", "options") ?></h2>
          </div>
        </div>
      </div>

    </div>
  </div>

<?php get_template_part("template-parts/stripes/stripes") ?>

<?php get_template_part("template-parts/page/columns");

get_template_part("template-parts/page/contact");

get_template_part("template-parts/testimonials/slider");

get_footer();
