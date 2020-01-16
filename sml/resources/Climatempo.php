<?php
	namespace Climatempo;
	
	class Climatempo
	{
	
		protected $token;
		public function __construct($token) 
		{
			$this->token = $token;
		}
		
		public function current($cityId) 
		{
			$url        = 'http://apiadvisor.climatempo.com.br/api/v1/weather/locale/'.$cityId.'/current?token='.$this->token;
			$content    = $this->request($url, null, 'get', $httpCode);
			if ($httpCode != 200) {
				throw new \Exception($this->readErrorMessage($content), 1);            
			}
			return new Weather(json_decode($content));
		}

		protected function request($url, $data = null, $method = 'get', &$httpCode = null) 
		{
			$method     = strtolower($method);
			$ch         = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			if ($method == 'post') {
				curl_setopt($ch, CURLOPT_POST, 1);
			}
			if ($data and is_array($data)) {
				$data = http_build_query($data);
			}
			if ($method == 'post' and $data) {            
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			}
			$content    = curl_exec($ch);
			$httpCode   = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			curl_close($ch);
			
			return $content;
		}
		
		protected function readErrorMessage($content) 
		{
			$json = json_decode($content, true);
			if (json_last_error() != JSON_ERROR_NONE) {
				return $content;
			}
			return isset($json['detail']) ? $json['detail'] : $content;
		}
	
	}
?>