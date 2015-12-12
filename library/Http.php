<?php

namespace FastShipping\Lib;

class Http
{
	protected $endpoint = "https://fastshipping.ciawn.com.br/v1/";
	protected $token    = "b3a3ca59438f695561eab489a0a514ff23d775b8ab485994a62916c94e8f73725c8d8b7168153e2e";
	protected $url      = "";

	public function get()
	{
		if (empty($this->codeTracking))
		{
			return trigger_error("URL not create verify and try", E_USER_ERROR);
		}

		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => $this->url,
		));
		
		$response = curl_exec($curl);
		curl_close($curl);

		return json_decode($response);
	}
}