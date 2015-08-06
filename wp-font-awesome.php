<?php
   /*
   Plugin Name: WP Font Awesome
   Plugin URI: https://wordpress.org/plugins/wp-font-awesome/
   Description: This plugin allows the easily embed Font Awesome to your site.
   Version: 1.0
   Author: Zayed Baloch
   Author URI: http://www.radlabs.biz/
   License: GPL2
   */

defined('ABSPATH') or die("No script kiddies please!");
define( 'ZB_VERSION',   '1.0' );
define( 'ZB_URL', plugins_url( '', __FILE__ ) );
define( 'ZB_TEXTDOMAIN',  'zb_font_awesome' );

function zb_wp_font_awesome() {
  load_plugin_textdomain( ZB_TEXTDOMAIN );
}
add_action( 'init', 'zb_wp_font_awesome' );

function wp_font_awesome_style() {
  wp_register_style('fontawesome-css', ZB_URL . '/font-awesome/css/font-awesome.min.css', array(), ZB_VERSION);
  wp_enqueue_style('fontawesome-css');
}
add_action('wp_enqueue_scripts', 'wp_font_awesome_style');

function wp_fa_shortcode( $atts ) {
  extract( shortcode_atts( array( 'icon' => 'home', ), $atts ) );
  return '<i class="fa fa-'.str_replace('fa-','',$icon).'"></i>';
}

add_shortcode( 'wpfa', 'wp_fa_shortcode' );
add_filter('wp_nav_menu_items', 'do_shortcode');
add_filter('widget_text', 'do_shortcode');
add_filter('widget_title', 'do_shortcode');
