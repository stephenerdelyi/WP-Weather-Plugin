<?php
	//security precaution
	if(!defined('ABSPATH')) {
		exit;
	}
	
	// callback: text field
	function stevesweather_callback_text_field($args) {
		$options = get_option( 'stevesweather_options', stevesweather_options_default() );

		$id    = isset( $args['id'] )    ? $args['id']    : '';
		$label = isset( $args['label'] ) ? $args['label'] : '';
		$length = isset( $args['length'] ) ? $args['length'] : '20';
		
		$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
				
		echo '<input id="stevesweather_options'. $id .'" name="stevesweather_options['. $id .']" type="text" size="' . $length . '" value="'. $value .'">';
		echo '<label for="stevesweather_options'. $id .'">'. $label .'</label>';
		
	}
	
	// callback: select field
	function stevesweather_callback_select_field($args) {
		$options = get_option( 'stevesweather_options', stevesweather_options_default() );

		$id    = isset( $args['id'] )    ? $args['id']    : '';
		$label = isset( $args['label'] ) ? $args['label'] : '';
	
		$selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
		$select_options = $args['selectables'];
		
		echo '<select id="stevesweather_options_'. $id .'" name="stevesweather_options['. $id .']">';
	
		foreach ( $select_options as $value => $option ) {
			$selected = selected( $selected_option === $value, true, false );
			echo '<option value="'. $value .'"'. $selected .'>'. $option .'</option>';
		}
	
		echo '</select> <label for="stevesweather_options_'. $id .'">'. $label .'</label>';
	}
	
	// callback: checkbox field
	function stevesweather_callback_checkbox_field($args) {	
		$options = get_option( 'stevesweather_options', stevesweather_options_default() );
	
		$id    = isset( $args['id'] )    ? $args['id']    : '';
		$label = isset( $args['label'] ) ? $args['label'] : '';

		$checked = isset( $options[$id] ) ? checked( $options[$id], 1, false ) : '';
		
		echo '<input id="stevesweather_options_'. $id .'" name="stevesweather_options['. $id .']" type="checkbox" value="1"'. $checked .'> ';
		echo '<label for="stevesweather_options_'. $id .'">'. $label .'</label>';
		
	}
	
	function stevesweather_callback_section_demo() {
		$options = get_option( 'stevesweather_options', stevesweather_options_default() );
		$weatherObj = new Weather($options);
		echo $weatherObj->render();
	}
	
	function stevesweather_callback_section_location($args) {
		echo 'These settings allow you to edit the weather location.';
	}
	
	function stevesweather_callback_section_options($args) {
		echo 'These settings allow you to edit the weather plugin presentation options.';
	}
	
	function stevesweather_callback_section_api($args) {
		echo 'You will need to obtain an API key from <a href="https://home.openweathermap.org/users/sign_in" target="_blank">OpenWeatherMap.com</a>.';
		echo '<p><em>For demo purposes, the default API key beginning with 16efd... can be used.</em></p>';
	}
	
	// validate plugin settings
	function stevesweather_callback_validate_options($input) {
		
		if(isset($input['city_name'])) {
			$input['city_name'] = sanitize_text_field($input['city_name']);
		}
		
		return $input;
	}
?>