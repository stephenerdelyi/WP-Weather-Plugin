<?php
	class Weather {
		private $pluginOptions = array();
		private $requestUrl = "";
		private $apiResponse;
		
		public function __construct($pluginOptions) {
			$this->pluginOptions = $pluginOptions;
			$this->requestUrl = 'http://api.openweathermap.org/data/2.5/forecast?cnt=1&q=' . $this->pluginOptions['city_name'] . ',' . $this->pluginOptions['country'] . '&APPID=' . $this->pluginOptions['api_key'];
			$this->apiResponse = json_decode(file_get_contents($this->requestUrl), true);
		}
		
		public function returnTest() {
			return $this->apiResponse["list"][0]["weather"][0]["main"];
		}
	}
?>