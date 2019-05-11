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
 * Additional `breadcrumb` class with `f5 mt2 mb2 font-color2`
 *
 * @param array $attributes attributes of HTML element which are assembled into the output.
 * @return attributes of HTML element which are assembled into the output.
 */

function pabelog_attr_breadcrumb($attributes)
{
  if (is_single()) {
    $attributes['class'] .= ' f5 mt2 mb2 font-color2 lh-copy';
    return $attributes;
  } else {
    $attributes['class'] .= ' f5 mt2 mb2 font-color2 pl4 pl0-ns pr4 pr0-ns lh-copy';
    return $attributes;
  }
}
add_filter('genesis_attr_breadcrumb', 'pabelog_attr_breadcrumb');