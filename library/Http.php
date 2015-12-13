<?php

namespace FastShipping\Lib;

abstract class Http
{
	protected $endpoint = "https://fastshipping.ciawn.com.br/v1/";
	protected $token    = "b3a3ca59438f695561eab489a0a514ff23d775b8ab485994a62916c94e8f73725c8d8b7168153e2e";
	protected $url      = "";
	protected $data     = array();
	protected $curl     = null;
	protected $method   = null;

	public function get()
	{
		return json_decode($this->run());
	}

	public function post()
	{
		$this->method = "POST";
		return json_decode($this->run());
	}

	public function run()
	{
		$this->curl = curl_init();
		curl_setopt($this->curl, CURLOPT_URL, $this->url);   
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, 0);

		if ($this->method == "POST")
		{
			curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($this->curl, CURLOPT_POST, true);
			curl_setopt($this->curl, CURLOPT_POSTFIELDS, $this->data);
		}

		$response = curl_exec($this->curl);
		curl_close($this->curl);

		return $response;
	}

}