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
 * Additional `title-area` class with `bb b--light-gray w-two-thirds-ns center`
 * `title-area` is used on `header` tag
 *
 * @param array $attributes attributes of HTML element which are assembled into the output.
 * @return attributes of HTML element which are assembled into the output.
 */

function pabelog_attr_title_area($attributes)
{
  $attributes['class'] .= ' bb b--light-gray w-two-thirds-ns center pl4 pr4 pl0-ns pr0-ns';
  return $attributes;
}
add_filter('genesis_attr_title-area', 'pabelog_attr_title_area');

/**
 * Additional `site-title` class with `f1`
 * `title-area` is used inside `header` tag
 *
 * @param array $attributes attributes of HTML element which are assembled into the output.
 * @return attributes of HTML element which are assembled into the output.
 */

function pabelog_attr_site_title( $attributes ) {
  if (is_archive()) {
    $attributes['class'] .= ' f1 mt4 mb2 b lh-solid';
    return $attributes;
  } else {
    $attributes['class'] .= ' f1';
    return $attributes;
  }
}
add_filter('genesis_attr_site-title', 'pabelog_attr_site_title');

/**
 * Additional `site-description` class with `font-color2`
 * `title-description` is used inside `header` tag
 *
 * @param array $attributes attributes of HTML element which are assembled into the output.
 * @return attributes of HTML element which are assembled into the output.
 */

function pabelog_attr_site_description($attributes)
{
  $attributes['class'] .= ' font-color2';
  return $attributes;
}
add_filter('genesis_attr_site-description', 'pabelog_attr_site_description');