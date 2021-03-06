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
        <div class="row align-items-stretch justify-content-center">
          <?php if (get_sub_field("image_position") == "left") get_template_part("template-parts/stripes/image") ?>
          <?php get_template_part("template-parts/stripes/text") ?>
          <?php if (get_sub_field("image_position") == "right") get_template_part("template-parts/stripes/image") ?>
        </div>
      </div>
    </div>
  <?php endwhile ?>
<?php endif ?>
