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

console('this is category page');

//* Remove the post content
remove_action('genesis_entry_content', 'genesis_do_post_content');

//* Remove the post image
remove_action('genesis_entry_content', 'genesis_do_post_image', 8);

//* Remove the post meta function
remove_action('genesis_entry_footer', 'genesis_post_meta');

genesis();
