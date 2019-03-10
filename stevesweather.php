<?php
	/*
	Plugin Name: Steve's Weather Plugin
	Description: A simple weather plugin that's pretty.
	Plugin URI:  http://steveerdelyi.com/
	Author:      Steve Erdelyi
	Version:     1.0
	Text Domain: stevesweather
	*/
	
	//security precaution
	if(!defined('ABSPATH')) {
		exit;
	}
	
	function stevesweather_options_default() {
		return array(
			'city_name' => 'Reno',
			'country' => 'us',
			'format' => 'F',
			'theme' => 'red',
			'rounded_corners' => false,
			'api_key' => '16efdce8b9629fc18e7f06fb8baa4609',
		);
	}
	
	//$pluginOptions = get_option('stevesweather_options', stevesweather_options_default());
	require_once(plugin_dir_path(__FILE__) . 'includes/weather.php');
		
	if(is_admin()) {
		require_once(plugin_dir_path(__FILE__) . 'admin/settings.php');
		require_once(plugin_dir_path(__FILE__) . 'admin/settings-register.php');
		require_once(plugin_dir_path(__FILE__) . 'admin/settings-callbacks.php');
	}
	
	// custom loop shortcode: [stevesweather]
	function stevesweather_shortcode_handler($overrides) {
		// define shortcode variables
		extract(shortcode_atts(array( 
			
			'bgcolor' => 'white',
			
		), $overrides));
		
		// begin output variable
		$output  = '<h3>Custom Example: Shortcodes</h3>';
		$output .= 'Bg color attribute: ' . $bgcolor;
		
		// return output
		return $output;
		
	}
	// register shortcode function
	add_shortcode( 'stevesweather', 'stevesweather_shortcode_handler' );
?>