<div class="card">
  <div class="card-header text-left" id="title_<?php the_ID() ?>">
    <h5 class="mb-0">
      <button class="btn btn-link" data-toggle="collapse" data-target="#item_<?php the_ID() ?>">
        <?php the_title() ?>
      </button>
    </h5>
  </div>

  <div id="item_<?php the_ID() ?>" class="collapse" data-parent="#accordion">
    <div class="card-body">
      <?php the_content() ?>
    </div>
  </div>
</div>
