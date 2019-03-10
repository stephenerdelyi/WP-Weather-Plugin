<?php
	//security precaution
	if(!defined('ABSPATH')) {
		exit;
	}
	
	function stevesweather_register_settings() {
		register_setting( 
			'stevesweather_options', 
			'stevesweather_options', 
			'stevesweather_callback_validate_options' 
		); 
		
		add_settings_section( 
			'stevesweather_section_demo', 
			'Weather Plugin Demo', 
			'stevesweather_callback_section_demo', 
			'stevesweather'
		);
		
		add_settings_section( 
			'stevesweather_section_location', 
			'Customize Weather Location', 
			'stevesweather_callback_section_location', 
			'stevesweather'
		);
		
		add_settings_section( 
			'stevesweather_section_options', 
			'Customize Weather Presentation Options', 
			'stevesweather_callback_section_options', 
			'stevesweather'
		);
		
		add_settings_section( 
			'stevesweather_section_api', 
			'OpenWeatherMap API Key', 
			'stevesweather_callback_section_api', 
			'stevesweather'
		);
		
		add_settings_field(
			'city_name',
			'City Name',
			'stevesweather_callback_text_field',
			'stevesweather',
			'stevesweather_section_location',
			[ 'id' => 'city_name', 'length' => '13', 'label' => 'The city name you would like weather for' ]
		);
		
		add_settings_field(
			'country',
			'Country',
			'stevesweather_callback_select_field',
			'stevesweather',
			'stevesweather_section_location',
			[ 'id' => 'country', 'label' => 'The country you would like weather for',
			  'selectables' => array(
				'uk'	=> 'United Kingdon',
				'us'	=> 'United States',
			  )]
		);
		
		add_settings_field(
			'units',
			'Celsius/Fahrenheit',
			'stevesweather_callback_select_field',
			'stevesweather',
			'stevesweather_section_options',
			[ 'id' => 'units', 'label' => 'The format you would like your output to be',
			  'selectables' => array(
				'F'	=> 'Fahrenheit',
				'C'	=> 'Celsius',
			  )]
		);
		
		add_settings_field(
			'theme',
			'Background Color',
			'stevesweather_callback_select_field',
			'stevesweather',
			'stevesweather_section_options',
			[ 'id' => 'theme', 'label' => 'The background color for the container',
			  'selectables' => array(
				'teal'		=> 'Teal',
				'sherbert'	=> 'Sherbert',
				'evening'	=> 'Evening',
				'green'		=> 'Green',
				'salmon'		=> 'Salmon',
				'purple'	=> 'Purple',
				'blush'	=> 'Blush',
				'orange'		=> 'Orange',
			  )]
		);
		
		add_settings_field(
			'rounded_corners',
			'Rounded Corners',
			'stevesweather_callback_checkbox_field',
			'stevesweather',
			'stevesweather_section_options',
			[ 'id' => 'rounded_corners', 'label' => 'Select to add a light border radius']
		);
		
		add_settings_field(
			'border',
			'Border',
			'stevesweather_callback_checkbox_field',
			'stevesweather',
			'stevesweather_section_options',
			[ 'id' => 'border', 'label' => 'Select to add a 1px border']
		);
		
		add_settings_field(
			'api_key',
			'API Key',
			'stevesweather_callback_text_field',
			'stevesweather',
			'stevesweather_section_api',
			[ 'id' => 'api_key', 'length' => '40' ]
		);
	}
	add_action('admin_init', 'stevesweather_register_settings');
?>