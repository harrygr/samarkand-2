<?php
/**
 * Enable theme features
 */
add_theme_support('soil-clean-up');         // Enable clean up from Soil
add_theme_support('soil-relative-urls');    // Enable relative URLs from Soil
add_theme_support('soil-nice-search');      // Enable /?s= to /search/ redirect from Soil
add_theme_support('bootstrap-gallery');     // Enable Bootstrap's thumbnails component on [gallery]
add_theme_support('jquery-cdn');            // Enable to load jQuery from the Google CDN

/**
 * Configuration values
 */
define('GOOGLE_ANALYTICS_ID', of_get_option( 'analytics_id' )); // UA-XXXXX-Y (Note: Universal Analytics only, not Classic Analytics)


if (!defined('WP_ENV')) {
  define('WP_ENV', 'production');  // scripts.php checks for values 'production' or 'development'
}

// Adds the ability to have a header image
$args = array(
    'width'         => 150,
    'height'        => 150,
    //'default-image' => get_template_directory_uri() . '/assets/img/samarkand-logo-border.png',
    'default-image' => get_template_directory_uri() . '/assets/img/samarkand-logo-250.svg',
    'uploads'       => true,
);
add_theme_support( 'custom-header', $args );

/**
 * Add body class if sidebar is active
 */
function roots_sidebar_body_class($classes) {
  if (roots_display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }
  return $classes;
}
add_filter('body_class', 'roots_sidebar_body_class');

/**
 * Define which pages shouldn't have the sidebar
 *
 * See lib/sidebar.php for more details
 */
function roots_display_sidebar() {
  static $display;

  if (!isset($display)) {
    $sidebar_config = new Roots_Sidebar(
      /**
       * Conditional tag checks (http://codex.wordpress.org/Conditional_Tags)
       * Any of these conditional tags that return true won't show the sidebar
       *
       * To use a function that accepts arguments, use the following format:
       *
       * array('function_name', array('arg1', 'arg2'))
       *
       * The second element must be an array even if there's only 1 argument.
       */
      array(
//        'is_404',
//        'is_front_page'
      ),
      /**
       * Page template checks (via is_page_template())
       * Any of these page templates that return true won't show the sidebar
       */
      array(
        'template-custom.php'
      )
    );
    $display = apply_filters('roots/display_sidebar', $sidebar_config->display);
  }  

  return $display;
}

/**
 * $content_width is a global variable used by WordPress for max image upload sizes
 * and media embeds (in pixels).
 *
 * Example: If the content area is 640px wide, set $content_width = 620; so images and videos will not overflow.
 * Default: 1140px is the default Bootstrap container width.
 */
if (!isset($content_width)) { $content_width = 1140; }


/**
 * Allow SVG uploads
 * @param  array $mimes Allowed mimes
 * @return array        
 */
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
