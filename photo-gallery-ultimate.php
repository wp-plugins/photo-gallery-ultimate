<?php
/*
Plugin Name: Photo Gallery Ultimate
Description: An easy way to place a photo gallery on your Wordpress site.
Version: 1.0
Author: Jeff Bullins
Author URI: http://www.thinklandingpages.com
*/

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

//include_once 'cmb2Settings.php';

include_once 'custom-post-type.php';  


function photo_gallery_activate() {
	$photoGalleryCustomPostType = new PhotoGalleryCustomPostType();
	$photoGalleryCustomPostType->create_post_type();
	global $wp_rewrite;
	$wp_rewrite->flush_rules();
}


register_activation_hook( __FILE__, 'photo_gallery_activate');

 