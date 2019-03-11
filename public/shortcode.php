<?php
	//custom loop shortcode: [stevesweather]
	function stevesweather_shortcode_handler($overrides) {
		//define shortcode variables and default values
		extract(shortcode_atts(array( 
			
			'bgcolor' => 'white',
			
		), $overrides));
		
		//define the options used for the plugin
		$options = get_option('stevesweather_options', stevesweather_options_default());
		//define the weather object
		$weatherObj = new Weather($options);
		//inject rendered weather view into the output
		$output .= $weatherObj->render();
		
		return $output;
		
	}
	//register shortcode function
	add_shortcode('stevesweather', 'stevesweather_shortcode_handler');
?>