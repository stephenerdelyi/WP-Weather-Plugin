<?php
	class Weather {
		private $pluginOptions;
		private $requestUrl;
		private $units;
		private $unitLetter;
		private $apiResponse;
		private $temperature;
		private $cityName;
		private $countryName;
		private $description;
		private $rounded;
		private $icon;
		private $theme;
		private $border;
		
		public function __construct($pluginOptions) {
			$this->pluginOptions = $pluginOptions;
			$this->units = ($this->pluginOptions["units"] == "F") ? 'imperial' : 'metric';
			$this->requestUrl = 'http://api.openweathermap.org/data/2.5/forecast?cnt=1&units=' . $this->units . '&q=' . $this->pluginOptions['city_name'] . ',' . $this->pluginOptions['country'] . '&APPID=' . $this->pluginOptions['api_key'];
			$this->apiResponse = json_decode(file_get_contents($this->requestUrl), true);
		
			//fill values
			$this->cityName = $this->apiResponse["city"]["name"];
			$this->countryName = $this->apiResponse["city"]["country"];
			$this->unitLetter = $this->pluginOptions["units"];
			$this->temperature = floor($this->apiResponse["list"][0]["main"]["temp"]);
			$this->description = $this->apiResponse["list"][0]["weather"][0]["description"];
			$this->icon = str_replace("n","d", $this->apiResponse["list"][0]["weather"][0]["icon"]);
			$this->theme = $this->pluginOptions["theme"];
			
			//conditional filling/filtering
			if($this->pluginOptions["rounded_corners"] == "1") {
				$this->rounded = "round";
			}
			if($this->pluginOptions["border"] == "1") {
				$this->border = "border";
			}
		}
		
		public function validAPIKey() {
			if($this->apiResponse["cod"] == "200") {
				return true;
			}
			
			return false;
		}
		
		public function render() {
			wp_enqueue_style( 'stevesweather', plugin_dir_url( dirname( __FILE__ ) ) . 'public/css/styles.css', array(), null, 'screen' );
			
			if($this->validAPIKey()) {
				return 	'
					<div class="stevesweather ' . $this->rounded . ' ' . $this->theme . ' ' . $this->border . '">
						<p class="city">Weather for ' . $this->cityName . ', ' . $this->countryName . '</p>
						<img class="icon" src="' . plugin_dir_url( dirname( __FILE__ ) ) . 'public/icons/' . $this->icon . '.svg' . '"/>
						<p class="temperature">' . $this->temperature . '&deg;' . $this->unitLetter . '</p>
						<p class="conditions">' . $this->description . '</p>
					</div>
					';
			} else {
				return 'Could not display weather: OpenWeatherMap API Error.';
			}	
		}
	}
?>