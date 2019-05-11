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

console( 'this is single' );

remove_action( 'genesis_site_title', 'genesis_seo_site_title' );
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );

/**
 * Appends HTML to the opening markup for .title-area.
 *
 * @param string $close_html HTML tag being processed by the API.
 * @param array  $args       Array with markup arguments.
 *
 * @return string
 */

function insert_html_after_title_area_markup( $close_html, $args ) {
    if ( $close_html ) {
        $close_html = $close_html . genesis_do_breadcrumbs();
    }
    return $close_html;
}
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
add_filter( 'genesis_markup_title-area_close', 'insert_html_after_title_area_markup', 10, 2 );

genesis();