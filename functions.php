<?php
/**
 * Pabelog Theme.
 * 
 * A theme used on pabelog.com.
 * 
 * @package    Pabelog Theme
 * @author     Nadiar AS
 * @link       https://github.com/HackinBlog/pabelog-theme
 * @copyright  Copyright (c) 2019, Nadiar AS
 * @license    MIT
 */

require_once('lib/const.php');
require_once('lib/filter.php');

load_child_theme_textdomain('pabelog');

// Theme support

add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
add_theme_support('genesis-responsive-viewport');
add_theme_support('Genesis-accessibility', array(
  '404-page',
  'drop-down-menu',
  'headings',
  'rems',
  'search-form',
  'skip-links',
));

add_theme_support('Genesis-footer-widgets', 3);

// Pabelog support

function console($message)
{
  if (PABELOG_THEME_DEBUG) {
    echo '<script type="text/javascript">console.log("' . $message . '");</script>';
  }
}

function pabelog_deregister_scripts()
{
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('genesis_footer', 'genesis_do_footer');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('admin_print_styles', 'print_emoji_styles');
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
  add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
  add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
  wp_deregister_script('wp-embed');
  wp_deregister_script('jquery');
  wp_deregister_style('wp-block-library');
  wp_dequeue_style('ez-icomoon');
  wp_dequeue_style('ez-toc');
}
add_action('wp_enqueue_scripts', 'pabelog_deregister_scripts');

function pabelog_load_tachyons_css()
{
  wp_enqueue_style('tachyons', PABELOG_NODE_MODULES_DIR . '/tachyons/css/tachyons.min.css');
}
add_action('wp_enqueue_scripts', 'pabelog_load_tachyons_css', 5);

function pabelog_custom_footer()
{
  ?>
  <div class="bt b--light-gray w-two-thirds-ns center mt5">
    <p class="font-color2 f5 tc">&copy; Copyright 2019 <a href="/">Pabelog</a> &middot; All Rights Reserved</p>
  </div>
<?php
}
add_action('genesis_footer', 'pabelog_custom_footer');

// `wpautop` This is required to remove extra <p> tag added to description by WordPress
// Add Title and Description for WordPress category page

function pabelog_archive_header()
{
  $slug = '';
  if (is_category()) {
    $slug = 'Kategori: ';
  }
  if (is_tag()) {
    $slug = 'Tag: ';
  }
  if (is_archive()) {
    echo '<div class="pl4 pl0-ns pr4 pl0-ns"><div class="f2-ns f4"><h1>';
    echo single_cat_title($slug, true);
    echo '</h1></div>';

    echo '<p class="lh-copy mb5">';
    echo term_description();
    echo '</p></div>';
  }
}
remove_filter('term_description', 'wpautop');
add_action('genesis_before_loop', 'pabelog_archive_header');
