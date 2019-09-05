<div class="stripe darkblue">
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-12 col-md-4 text-center contact-form">
        <?php
        $code = '[contact-form-7 id="' . get_field("contact_form", "options") . '"]';
        echo do_shortcode($code);
        ?>
      </div>
    </div>
  </div>
</div>
