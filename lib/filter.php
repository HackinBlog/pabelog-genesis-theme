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

function pabelog_attr_title_area( $attributes ) {
  $attributes['class'] .= ' bb b--light-gray w-two-thirds-ns center';
  return $attributes;
}
add_filter( 'genesis_attr_title-area', 'pabelog_attr_title_area' );

 /**
 * Additional `site-title` class with `f1`
 * `title-area` is used inside `header` tag
 *
 * @param array $attributes attributes of HTML element which are assembled into the output.
 * @return attributes of HTML element which are assembled into the output.
 */

function pabelog_attr_site_title( $attributes ) {
  $attributes['class'] .= ' f1';
  return $attributes;
}
add_filter( 'genesis_attr_site-title', 'pabelog_attr_site_title' );

 /**
 * Additional `site-description` class with `font-color2`
 * `title-description` is used inside `header` tag
 *
 * @param array $attributes attributes of HTML element which are assembled into the output.
 * @return attributes of HTML element which are assembled into the output.
 */

function pabelog_attr_site_description( $attributes ) {
  $attributes['class'] .= ' font-color2';
  return $attributes;
}
add_filter( 'genesis_attr_site-description', 'pabelog_attr_site_description' );

function pabelog_attr_site_inner( $attributes ) {
	$attributes['class'] .= ' w-two-thirds-ns center';
	return $attributes;
}
add_filter('genesis_attr_site-inner', 'pabelog_attr_site_inner');

function pabelog_attr_entry_content( $attributes ) {
  if ( is_single() ) {
    $attributes['class'] .= ' w-two-thirds-ns mb5';
  } else {
    $attributes['class'] .= ' w-two-thirds-ns';
  }
	return $attributes;
}
add_filter('genesis_attr_entry-content', 'pabelog_attr_entry_content');

function pabelog_attr_entry_title( $attributes ) {
	$attributes['class'] .= ' f1 lh-copy';
	return $attributes;
}
add_filter('genesis_attr_entry-title', 'pabelog_attr_entry_title');

function pabelog_post_info_filter( $post_info ) {
  if ( get_the_date() == get_the_modified_date() ) {
    return '<span class="db lh-copy">Published: [post_date]</span>
            <span class="db">[post_edit]</span>';
  } else {
    if ( !is_page() ) {
      return '<span class="db lh-copy">Updated: [post_modified_date]</span>
              <span class="db">Published: [post_date]</span>
              <span class="db lh-copy">[post_edit]</span>';
    }
  }
}
add_filter( 'genesis_post_info', 'pabelog_post_info_filter' );

function pabelog_post_info_markup_open( $open, $args ) {
  $attributes = genesis_attr( $args['context'], array('class'=>'2'), $args );
  $new_attributes = rtrim( $attributes, '"') . ' fr-ns w-25-ns font-color2 f5 tr"';
	return sprintf( '<div %s>', $new_attributes );
}
add_filter( 'genesis_markup_entry-meta-before-content_open', 'pabelog_post_info_markup_open', 10, 2 );

function pabelog_post_info_markup_close( $close, $args ) {
	return '</div>';
}
add_filter( 'genesis_markup_entry-meta-before-content_close', 'pabelog_post_info_markup_close', 10, 2 );

/**
 * Add the new class to the caption.
 *
 * @param  array  $attr    Shortcode attributes
 * @param  string $content Caption text
 * @return string
 */

function pabelog_caption_shortcode( $attr, $content = NULL ) {
  $caption = img_caption_shortcode( $attr, $content );
  $caption = str_replace( 'class="wp-caption-text', 'class="lh-copy pt3 font-color2 tr f5', $caption );
  return $caption;
}

/**
 * Replace the default caption shortcode handler.
 *
 * @return void
 */

function pabelog_replace_wp_caption_shortcode() {
  remove_shortcode( 'caption', 'img_caption_shortcode' );
  remove_shortcode( 'wp_caption', 'img_caption_shortcode' );
  add_shortcode( 'caption', 'pabelog_caption_shortcode' );
  add_shortcode( 'wp_caption', 'pabelog_caption_shortcode' );
}

add_action( 'after_setup_theme', 'pabelog_replace_wp_caption_shortcode' );

 /**
 * Additional `breadcrumb` class with `f5 mt2 mb2 font-color2`
 *
 * @param array $attributes attributes of HTML element which are assembled into the output.
 * @return attributes of HTML element which are assembled into the output.
 */

function pabelog_attr_breadcrumb( $attributes ) {
	$attributes['class'] .= ' f5 mt2 mb2 font-color2';
	return $attributes;
}
add_filter('genesis_attr_breadcrumb', 'pabelog_attr_breadcrumb');

 /**
 * Additional `entry-comments` class with `bg-near-white pa5-ns pt4-ns p2`
 *
 * @param array $attributes attributes of HTML element which are assembled into the output.
 * @return attributes of HTML element which are assembled into the output.
 */

function pabelog_attr_entry_comments( $attributes ) {
	$attributes['class'] .= '  bg-near-white pa5-ns pt4-ns p2';
	return $attributes;
}
add_filter('genesis_attr_entry-comments', 'pabelog_attr_entry_comments');