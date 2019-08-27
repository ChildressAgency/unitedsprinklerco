<?php if (have_rows("stripes")): ?>
  <!--  <pre>--><?php //print_r(get_field("stripes")) ?><!--</pre>-->
  <?php while (have_rows("stripes")):
    the_row();
    $image_size = get_sub_field("image_size");
    $image_alignment = get_sub_field("image_alignment");
    $color = get_sub_field("color");
    ?>
    <div class="stripe <?php echo $color ?>">
      <div class="<?php echo $image_size == "small" ? "container" : "container-fluid" ?>">
        <div class="row align-items-stretch">
          <?php if (get_sub_field("image_position") == "left") include("image.php") ?>
          <?php include("text.php") ?>
          <?php if (get_sub_field("image_position") == "right") include("image.php") ?>
        </div>
      </div>
    </div>
  <?php endwhile ?>
<?php endif ?>
