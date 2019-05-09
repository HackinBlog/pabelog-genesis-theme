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

console( 'this is home' );
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

genesis();