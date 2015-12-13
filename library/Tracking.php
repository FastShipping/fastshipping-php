<?php

/*
 * This file is part of FastShipping/fastshipping-php.
 *
 * (c) FastShipping - Reginaldo <fastshipping@ciawn.com.br>
 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

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