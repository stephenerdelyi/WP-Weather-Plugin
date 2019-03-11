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
	
	//the default options that this plugin will use
	function stevesweather_options_default() {
		return array(
			'city_name' => 'Reno',
			'country' => 'us',
			'units' => 'F',
			'theme' => 'evening',
			'rounded_corners' => true,
			'border' => true,
			'api_key' => '16efdce8b9629fc18e7f06fb8baa4609',
		);
	}
	
	//require the weather class
	require_once(plugin_dir_path(__FILE__) . 'includes/weather.php');
	
	//require the administrative files	
	if(is_admin()) {
		require_once(plugin_dir_path(__FILE__) . 'admin/settings.php');
		require_once(plugin_dir_path(__FILE__) . 'admin/settings-views.php');
		require_once(plugin_dir_path(__FILE__) . 'admin/settings-register.php');
		require_once(plugin_dir_path(__FILE__) . 'admin/settings-callbacks.php');
	}
	
	//require the shortcode file
	require_once(plugin_dir_path(__FILE__) . 'public/shortcode.php');
?>