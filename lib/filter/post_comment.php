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

/**
 * Additional `entry-comments` class with `bg-near-white pa5-ns pt4-ns p2`
 *
 * @param array $attributes attributes of HTML element which are assembled into the output.
 * @return attributes of HTML element which are assembled into the output.
 */

function pabelog_attr_entry_comments($attributes)
{
  $attributes['class'] .= ' bg-near-white pa5-ns pt4-ns pa4';
  return $attributes;
}
add_filter('genesis_attr_entry-comments', 'pabelog_attr_entry_comments');

/**
 * Additional `comment-time-link` class with `font-color2 f5`
 *
 * @param array $attributes attributes of HTML element which are assembled into the output.
 * @return attributes of HTML element which are assembled into the output.
 */

function pabelog_attr_entry_comment_time_link($attributes)
{
  $attributes['class'] .= ' f5';
  return $attributes;
}
add_filter('genesis_attr_comment-time-link', 'pabelog_attr_entry_comment_time_link');

/**
 * Callback function for the `comment_form_defaults` filter hook
 *
 * @param Array $defaults Defaults.
 * @return Array          Defaults modified.
 */

function pabelog_custom_comment_form($defaults)
{
  $defaults['class_form'] .= ' pl4 pr4 pl0-ns pr0-ns';
  $defaults['title_reply_before'] = '<div class="mt3"><span id="reply-title" class="pl4 pr4 pl0-ns pr0-ns b f3 lh-copy comment-reply-title">';
  $defaults['title_reply_after'] = '</span></div>';
  return $defaults;
};

add_filter('comment_form_defaults', 'pabelog_custom_comment_form');