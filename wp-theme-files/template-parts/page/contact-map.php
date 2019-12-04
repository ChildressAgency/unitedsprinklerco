<div class="stripe darkblue contact-stripe-map">
  <div class="container-fluid no-gutters">
    <div class="row justify-content-center align-items-stretch">
      <div class="col-12 col-md-6 px-0">
        <?php
        $addr = get_field("address", "options");
        $q = str_replace(" ", "+", $addr);
        ?>
        <iframe
            src="https://maps.google.com/maps?q=<?php echo $q ?>&output=embed"
            style="border:0;"></iframe>
      </div>
      <div class="col-12 col-md-6 text-center contact-form">
        <div class="pipe pt-3">
          <?php
          $code = '[contact-form-7 id="' . get_field("contact_form", "options") . '"]';
          echo do_shortcode($code);
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
