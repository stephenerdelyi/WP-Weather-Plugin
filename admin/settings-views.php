<?php
	//demo section view
	function stevesweather_view_section_demo() {
		$options = get_option('stevesweather_options', stevesweather_options_default());
		$weatherObj = new Weather($options);
		echo $weatherObj->render() . "<br><hr/>";
	}
	
	//location section view
	function stevesweather_view_section_location($args) {
		echo 'These settings allow you to edit the weather location.';
	}
	
	//presentation options view
	function stevesweather_view_section_options($args) {
		echo 'These settings allow you to edit the weather plugin presentation options.';
	}
	
	//API key view
	function stevesweather_view_section_api($args) {
		echo 'You will need to obtain an API key from <a href="https://home.openweathermap.org/users/sign_in" target="_blank">OpenWeatherMap.com</a>.';
		echo '<p><em>For demo purposes, the default API key beginning with 16efd... can be used.</em></p>';
	}
?>