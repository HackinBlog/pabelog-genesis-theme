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

function pabelog_attr_entry_content($attributes)
{
  if (is_single()) {
    $attributes['class'] .= ' w-two-thirds-ns mb5 pl4 pr4 pl0-ns pr0-ns';
  } else {
    $attributes['class'] .= ' w-two-thirds-ns pl4 pr4 pl0-ns pr0-ns';
  }
  return $attributes;
}
add_filter('genesis_attr_entry-content', 'pabelog_attr_entry_content');

/**
 * Additional `entry-title` class with `f1-ns lh-copy pl4 pr4 pl0-ns pr-ns`
 * `entry-title` is used for content title / post title
 *
 * @param array $attributes attributes of HTML element which are assembled into the output.
 * @return attributes of HTML element which are assembled into the output.
 */

function pabelog_attr_entry_title($attributes)
{
  if (is_archive()) {
    $attributes['class'] .= ' mb1 lh-copy pl4 pr4 pl0-ns pr-ns';
    return $attributes;
  } else {
    $attributes['class'] .= ' f1-ns lh-copy pl4 pr4 pl0-ns pr-ns';
    return $attributes;
  }
}
add_filter('genesis_attr_entry-title', 'pabelog_attr_entry_title');

function pagelog_entry_comments_link($attributes)
{
  $attributes['class'] .= ' db lh-copy';
  return $attributes;
}
add_filter('genesis_attr_entry-comments-link', 'pabelog_entry_comments_link');

function pabelog_post_info_filter($post_info)
{

  if (get_the_date() == get_the_modified_date()) {
    if (is_archive()) {
      return '<span class="font-color2 f5 pl4 pl0-ns">Published: [post_date]</span> · ' .
             '<span class="font-color2 f5">[post_comments zero="" one="1 Comment" more="% Comments"]</span>' .
             '<span class="font-color2 f5 pr4 pr0-ns">[post_edit]</span>';
    } else {
      return '<span class="db lh-copy">Published: [post_date]</span>' .
             '[post_comments zero="Leave a Comment" one="1 Comment" more="% Comments"]' .
             '<span class="db">[post_edit]</span>';
    }
  } else {
    if (is_archive()) {
      return '<span class="font-color2 f5 pl4 pl0-ns">Updated: [post_modified_date]</span> · ' .
             '<span class="font-color2 f5">[post_comments zero="" one="1 Comment" more="% Comments"]</span>' .
             '<span class="font-color2 f5 pr4 pr0-ns">[post_edit]</span>';
    } else {
      return '<span class="db lh-copy">Updated: [post_modified_date]</span>
              <span class="db">Published: [post_date]</span>' .
             '[post_comments zero="Leave a Comment" one="1 Comment" more="% Comments"]' .
             '<span class="db lh-copy">[post_edit]</span>';      
    }
  }
}
add_filter('genesis_post_info', 'pabelog_post_info_filter');

/**
 * Custom post info open tag
 *
 * @param  string $open html open tag
 * @param  array  $args
 * @return string html open tag for post info
 */

function pabelog_post_info_markup_open($open, $args)
{
  $attributes = genesis_attr($args['context'], array(), $args);
  $new_attributes = rtrim($attributes, '"') . ' fr-ns w-25-ns font-color2 f5 tr-ns pl4 pr4 pl0-ns pr0-ns"';

  if (is_home() || is_single()) {
    return sprintf('<div %s>', $new_attributes);
  } else {
    return sprintf('<div %s>', $attributes);
  }
}
add_filter('genesis_markup_entry-meta-before-content_open', 'pabelog_post_info_markup_open', 10, 2);

/**
 * Custom post info close tag
 *
 * @param  string $close html close tag
 * @param  array  $args
 * @return string html close tag for post info
 */

function pabelog_post_info_markup_close($close, $args)
{
  return '</div>';
}
add_filter('genesis_markup_entry-meta-before-content_close', 'pabelog_post_info_markup_close', 10, 2);


function pabelog_post_meta_filter($post_meta)
{
  if (!is_page()) {
    $post_meta = '<div class="font-color2 f5 pl4 pr4 pl0-ns pr0-ns">[post_categories before="Filed Under: "] [post_tags before="Tagged: "]</div>';
    return $post_meta;
  }
}
add_filter('genesis_post_meta', 'pabelog_post_meta_filter');

/**
 * Add the new class to the caption.
 *
 * @param  array  $attr    Shortcode attributes
 * @param  string $content Caption text
 * @return string
 */

function pabelog_caption_shortcode($attr, $content = NULL)
{
  $caption = img_caption_shortcode($attr, $content);
  $caption = str_replace('class="wp-caption-text', 'class="lh-copy pt3 font-color2 tr f5', $caption);
  return $caption;
}

/**
 * Replace the default caption shortcode handler.
 *
 * @return void
 */

function pabelog_replace_wp_caption_shortcode()
{
  remove_shortcode('caption', 'img_caption_shortcode');
  remove_shortcode('wp_caption', 'img_caption_shortcode');
  add_shortcode('caption', 'pabelog_caption_shortcode');
  add_shortcode('wp_caption', 'pabelog_caption_shortcode');
}

add_action('after_setup_theme', 'pabelog_replace_wp_caption_shortcode');