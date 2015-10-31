<?php
/*
Plugin Name: TwentySixteen Japanese fonts
Description: Optimize TwentySixteen's font for Japanese
Version: 0.1
Author: Hinaloe
Author URI: https://hinaloe.net/
Text Domain: twentysixteen-japanese-fonts
Domain Path: /languages
 */

if( ! defined ( 'ABSPATH' ) ) {
  exit(1);
}

function tsf_loadcss () {
if ( ! function_exists( 'twentysixteen_setup' ) ) {
  return;
}
  $extension = defined ( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'css' : 'min.css';
  wp_enqueue_style ( 'twentysixteen-japanese-font', plugin_dir_url (__FILE__ ) . 'css/fonts.' . $extension ,array( 'twentysixteen-style' ) );
}
add_action ( 'wp_enqueue_scripts', 'tsf_loadcss', 11 );
