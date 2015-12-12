<?php

namespace FastShipping\Lib;

class Tracking extends Http
{
	protected $codeTracking;

	public function getTracking()
	{
		if (empty($this->codeTracking))
		{
			return trigger_error("Token is empty", E_USER_ERROR);
		}
	
		$this->url = $this->endpoint . 'tracking/' . $this->codeTracking . '?token=' . $this->token;

		return $this->get();
	}

	public function setCodeTracking($codeTracking)
	{
		$this->codeTracking = $codeTracking;
	}

	public function getCodeTracking()
	{
		return $this->codeTracking;	
	}
}