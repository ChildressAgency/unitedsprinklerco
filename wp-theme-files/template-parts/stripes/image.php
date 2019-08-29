<?php
$image_size = get_sub_field("image_size");
$image_alignment = get_sub_field("image_alignment");
$color = get_sub_field("color");
?>

<div class="col-12 col-md-6 image text-center <?php echo $image_size ?>"
  <?php if ($image_size == "half") {
    echo 'style="background-image: url(' . get_sub_field("image")["sizes"]["large"] . ')"';
  } ?>>
  <?php if ($image_size == "small"): ?>
    <img class="img-fluid py-5" src="<?php echo get_sub_field("image")["sizes"]["large"] ?>"
         alt="<?php echo get_sub_field("image")["title"] ?>"/>
  <?php endif ?>
</div>
