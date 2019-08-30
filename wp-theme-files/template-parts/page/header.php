<div class="stripe blue page-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-md-6 image"
           style="background-image: url('<?php echo get_field("hero_image")["sizes"]["large"] ?>')">
        <div class="text backdrop align-items-center justify-content-end flex-row d-flex">
          <div>
            <p class="text-left heading">
              <?php echo get_field("header_title") ?>
            </p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 text align-items-center justify-content-start flex-row d-flex">
        <div>
          <p class="text-left body">
            <?php echo get_field("header_text") ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="page-title container-fluid">
  <div class="row">
    <div class="col-12 text-center">
      <h1><?php echo get_field("page_title") ?></h1>
    </div>
  </div>
</div>