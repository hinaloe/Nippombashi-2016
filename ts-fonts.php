<?php
/*
Plugin Name: Nippombashi 2016
Description: Optimize Twenty Sixteen's font for Japanese
Version: 0.5
Author: Hinaloe
Author URI: https://hinaloe.net/
Text Domain: nippombashi2016
Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 1 );
}

function tsf_loadcss() {
	if ( ! function_exists( 'twentysixteen_setup' ) ) {
		return;
	}
	$extension = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'css' : 'min.css';
	wp_enqueue_style( 'twentysixteen-japanese-font', plugin_dir_url( __FILE__ ) . 'css/fonts.' . $extension, array( 'twentysixteen-style' ) );
}

add_action( 'wp_enqueue_scripts', 'tsf_loadcss', 11 );

function tsf_editorcss( $mce_css ) {
	if ( ! function_exists( 'twentysixteen_setup' ) ) {
		return $mce_css;
	}
	$extension = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'css' : 'min.css';
	if ( ! empty( $mce_css ) ) {
		$mce_css .= ',';
	}
	$mce_css .= plugins_url( 'css/fonts.' . $extension, __FILE__ );

	return $mce_css;
}

add_filter( 'mce_css', 'tsf_editorcss' );
