<?php
//add_action('wp_footer', 'show_template');
function show_template()
{
  global $template;
  print_r($template);
}

add_action('wp_enqueue_scripts', 'jquery_cdn');
function jquery_cdn()
{
  if (!is_admin()) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', false, null, true);
    wp_enqueue_script('jquery');
  }
}

add_action('wp_enqueue_scripts', 'cai_scripts');
function cai_scripts()
{
  wp_register_script(
    'bootstrap-popper',
    'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js',
    array('jquery'),
    '',
    true
  );

  wp_register_script(
    'bootstrap-scripts',
    'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js',
    array('jquery', 'bootstrap-popper'),
    '',
    true
  );

  wp_register_script(
    'cai-scripts',
    get_stylesheet_directory_uri() . '/js/custom-scripts.min.js',
    array('jquery', 'bootstrap-scripts'),
    '',
    true
  );

  wp_enqueue_script('bootstrap-popper');
  wp_enqueue_script('bootstrap-scripts');
  wp_enqueue_script('cai-scripts');
}

add_filter('script_loader_tag', 'cai_add_script_meta', 10, 2);
function cai_add_script_meta($tag, $handle)
{
  switch ($handle) {
    case 'jquery':
      $tag = str_replace('></script>', ' integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>', $tag);
      break;

    case 'bootstrap-popper':
      $tag = str_replace('></script>', ' integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>', $tag);
      break;

    case 'bootstrap-scripts':
      $tag = str_replace('></script>', ' integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>', $tag);
      break;
  }

  return $tag;
}

add_action('wp_enqueue_scripts', 'cai_styles');
function cai_styles()
{
  wp_register_style(
    'google-fonts',
    'https://fonts.googleapis.com/css?family=Maitree:400,700|Nunito+Sans:400,600,700|Nunito:700'
  );

  wp_register_style(
    'fontawesome',
    'https://use.fontawesome.com/releases/v5.6.3/css/all.css'
  );

  wp_register_style(
    'cai-css',
    get_stylesheet_directory_uri() . '/style.css'
  );

  wp_enqueue_style('google-fonts');
  wp_enqueue_style('fontawesome');
  wp_enqueue_style('cai-css');
}

add_filter('style_loader_tag', 'cai_add_css_meta', 10, 2);
function cai_add_css_meta($link, $handle)
{
  switch ($handle) {
    case 'fontawesome':
      $link = str_replace('/>', ' integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">', $link);
      break;
  }

  return $link;
}

add_action('after_setup_theme', 'cai_setup');
function cai_setup()
{
  add_theme_support('post-thumbnails');
  //set_post_thumbnail_size(320, 320);
  add_theme_support('custom-logo');

  register_nav_menus(array(
    'nav-menu' => 'Header Navigation'
  ));

  load_theme_textdomain('cai', get_stylesheet_directory_uri() . '/languages');
}

add_filter('wp_get_attachment_image_attributes', function ($attr) {
  if (isset($attr['class']) && 'custom-logo' === $attr['class'])
    $attr['class'] = 'custom-logo img-fluid';

  return $attr;
});

add_action('init', 'cai_create_post_types');
function cai_create_post_types()
{
  register_post_type("testimonial", array(
    "public" => true,
    "menu_icon" => "dashicons-awards",
    "labels" => array(
      "name" => "Testimonials",
      "singular" => "Testimonial",
      'search_items' => 'Search Testimonials',
      'all_items' => 'All Testimonials',
      'edit_item' => 'Edit Testimonial',
      'update_item' => 'Update Testimonial',
      'add_new_item' => 'Add New Testimonial',
      'menu_name' => 'Testimonials',
    )
  ));
  register_post_type("service", array(
    "public" => true,
    "menu_icon" => "dashicons-hammer",
    "labels" => array(
      "name" => "Services",
      "singular" => "Service",
      'search_items' => 'Search Services',
      'all_items' => 'All Services',
      'edit_item' => 'Edit Service',
      'update_item' => 'Update Service',
      'add_new_item' => 'Add New Service',
      'menu_name' => 'Services',
    ),
    'supports' => array('title', 'editor', 'thumbnail')
  ));
  register_post_type("faq", array(
    "public" => true,
    "menu_icon" => "dashicons-editor-help",
    "labels" => array(
      "name" => "FAQs",
      "singular" => "FAQ",
      'search_items' => 'Search FAQs',
      'all_items' => 'All FAQs',
      'edit_item' => 'Edit FAQ',
      'update_item' => 'Update FAQ',
      'add_new_item' => 'Add New FAQ',
      'menu_name' => 'FAQs',
    )
  ));
  register_post_type("job", array(
    "public" => true,
    "menu_icon" => "dashicons-id",
    "labels" => array(
      "name" => "Jobs",
      "singular" => "Job",
      'search_items' => 'Search Jobs',
      'all_items' => 'All Jobs',
      'edit_item' => 'Edit Job',
      'update_item' => 'Update Job',
      'add_new_item' => 'Add New Job',
      'menu_name' => 'Employment',
    )
  ));
  flush_rewrite_rules();
}

add_action('widgets_init', 'cai_widgets_init');
function cai_widgets_init()
{

  register_sidebar(
    array(
      'name' => 'Contact Form',
      'id' => 'sidebar-1',
      'description' => 'Space for the contact form.',
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget' => '</section>',
      'before_title' => '<h2 class="widget-title">',
      'after_title' => '</h2>',
    )
  );

}

require_once dirname(__FILE__) . '/includes/class-wp-bootstrap-navwalker.php';
require_once dirname(__FILE__) . '/includes/custom-fields.php';
