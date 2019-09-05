<?php
get_header();

$services = new WP_Query(array(
  'post_type' => 'service',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'order' => 'ASC'
));
$roof = get_field('roof_carousel');
$community = get_field('community_carousel');

?>

  <div class="stripe page-header front-page-header">
    <div class="container-fluid">
      <div class="row image" style="background-image: url('<?php echo get_field("hero_image")["sizes"]["large"] ?>')">
        <div class="col-12 col-md-6 image">
          <div class="text backdrop align-items-center justify-content-end flex-row d-flex">
            <div>
              <p class="text-left heading">
                <?php echo get_field("header_title") ?>
              </p>
              <p class="text-left body">
                <?php echo get_field("header_text") ?>
              </p>
              <a class="button" href="<?php echo get_permalink(get_page_by_path("contact")) ?>">Request a Quote</a>
            </div>
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

<?php get_template_part("template-parts/waves") ?>

  <div id="content" class="pb-5">
    <?php if ($services->have_posts()): ?>
      <div class="container-fluid">
        <div class="row services front-page-services px-md-5 mx-md-5 justify-content-center align-items-start">
          <?php while ($services->have_posts()): $services->the_post() ?>
            <a class="col-12 col-md service text-center" href="<?php the_permalink() ?>">
              <img class="img-fluid" src="<?php echo get_field("icon") ?>"
                   alt="<?php echo get_the_title() ?>"/>
              <h4 class="pt-2"><?php the_title() ?></h4>
              <p class="pt-3">
                <?php echo get_field("summary") ?>
              </p>
            </a>
          <?php endwhile; ?>
        </div>
        <div class="row">
          <div class="col-12 text-center">
            <a class="button" href="<?php echo get_permalink(get_page_by_path("services")) ?>">Services</a>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>

  <div id="roof">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post() ?>
            <div class="col-12 col-md-10 text-center px-5 mx-5">
              <?php the_content() ?>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>

      <div class="row mt-5">

        <div id="roof-carousel" class="carousel slide carousel-fade col">
          <?php if ($roof): ?>
            <ol class="carousel-indicators text-center flex-wrap">
              <?php foreach ($roof as $i => $post): ?>
                <li data-target="#roof-carousel" data-slide-to="<?php echo $i ?>"
                    class="button <?php if ($i === 0) echo "active" ?>">
                  <?php echo $post["title"] ?>
                </li>
              <?php endforeach; ?>
            </ol>
            <div class="carousel-inner pb-3">

              <?php foreach ($roof as $i => $post): ?>
                <div class="carousel-item <?php if ($i === 0) echo "active" ?> container">
                  <div class="row justify-content-center">
                    <div class="col-12 col-md-7">
                      <?php echo $post["text"] ?>
                    </div>
                    <?php if ($post["image"]): ?>
                      <div class="col-12 col-md-3 text-center">
                        <img class="img-fluid" src="<?php echo $post["image"]["sizes"]["large"] ?>"
                             alt="<?php echo $post["title"] ?>"/>
                      </div>
                    <?php endif ?>
                  </div>
                  <div class="row">
                    <?php if ($post["button_link"]): ?>
                      <div class="col text-center">
                        <a class="button mb-0"
                           href="<?php echo $post["button_link"] ?>"><?php echo $post["button_text"] ?></a>
                      </div>
                    <?php endif ?>
                  </div>
                </div>
              <?php
              endforeach; ?>

            </div>
          <?php endif; ?>
        </div>

      </div>
    </div>
  </div>

<?php if ($community): ?>
  <div class="page-title container-fluid">
    <div class="row">
      <div class="col-12 text-center pb-4">
        <h1>Community Involvement</h1>
        <h3>We love supporting our local community</h3>
      </div>
    </div>
  </div>
  <div class="stripe gray" style="<?php echo "" ?>">

    <div id="community-carousel" class="carousel slide carousel-fade">
      <div class="carousel-inner">
        <?php foreach ($community as $i => $post): ?>
          <?php
          $last = count($community) - 1;
          if ($i == 0) {
            $next = $community[$i + 1];
            $prev = $community[$last];
          } else if ($i == $last) {
            $next = $community[0];
            $prev = $community[$i - 1];
          } else {
            $next = $community[$i + 1];
            $prev = $community[$i - 1];
          }
          ?>
          <div class="carousel-item <?php if ($i === 0) echo "active" ?> container mb-n5 mb-md-0"
               style="background-image: url('<?php echo $post["background"] ?>')">
            <div class="row justify-content-center py-5">
              <div class="col-12 col-md-4 text-center">
                <div class="circle">
                  <div class="text d-flex flex-column justify-content-center align-items-center">
                    <h4><?php echo $post["title"] ?></h4>
                    <?php echo $post["text"] ?>
                  </div>
                </div>
              </div>

              <a class="carousel-control-prev flex-column" href="#community-carousel" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <div class="description d-none d-md-block">
                  <?php echo $prev["title"] ?>
                </div>
              </a>

              <a class="carousel-control-next flex-column" href="#community-carousel" data-slide="next">
                <span class="carousel-control-next-icon"></span>
                <div class="description d-none d-md-block">
                  <?php echo $next["title"] ?>
                </div>
              </a>

            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
<?php endif ?>

<?php

get_template_part("template-parts/stripes/stripes");

get_template_part("template-parts/page/columns");

get_template_part("template-parts/page/contact");

?>

<?php
the_post();
if (have_rows("affiliations")):
  ?>
  <div class="container affiliations">
    <div class="row">
      <div class="col-12 text-center">
        <h1>Professional Affiliations</h1>
      </div>
    </div>
    <div class="row align-items-center py-5 text-center">
      <?php while (have_rows("affiliations")): the_row() ?>
        <a class="col-6 col-md" href="<?php the_sub_field("url") ?>">
          <img class="img-fluid" src="<?php echo get_sub_field("image")["sizes"]["large"] ?>"
               alt="<?php echo get_sub_field("image")["title"] ?>"/>
        </a>
      <?php endwhile ?>
    </div>
  </div>
<?php endif ?>

<?php get_footer();
