<div class="col-12 col-md-6 text text-center p-5">
  <div class="text-left heading mb-3"><?php the_sub_field("heading") ?></div>
  <div class="text-left body"><?php the_sub_field("body") ?></div>
  <?php if (get_sub_field("button_link")): ?>
    <div class="text-left body">
      <a class="button" href="<?php echo get_sub_field("button_link") ?>"><?php echo get_sub_field("button_text") ?></a>
    </div>
  <?php endif ?>
</div>
