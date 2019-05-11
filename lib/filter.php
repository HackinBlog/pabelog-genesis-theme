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

require_once('filter/breadcrumb.php');
require_once('filter/site_title.php');
require_once('filter/post_content.php');
require_once('filter/post_comment.php');

function pabelog_attr_site_inner($attributes)
{
  $attributes['class'] .= ' w-two-thirds-ns center';
  return $attributes;
}
add_filter('genesis_attr_site-inner', 'pabelog_attr_site_inner');

/**
 * Additional `sidebar-primary` class with `pl4 pr4 pl0-ns pr0-ns`
 *
 * @param array $attributes attributes of HTML element which are assembled into the output.
 * @return attributes of HTML element which are assembled into the output.
 */

function pabelog_attr_sidebar_primary($attributes)
{
  $attributes['class'] .= ' pl4 pr4 pl0-ns pr0-ns';
  return $attributes;
}
add_filter('genesis_attr_sidebar', 'pabelog_attr_sidebar_primary');