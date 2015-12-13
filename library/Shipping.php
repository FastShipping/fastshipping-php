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

class Shipping extends Http
{
	protected $destinationPostalCode;
	protected $destinationCountry;
	protected $destinationCity;
	protected $originPostalCode;
	protected $originCountry;
	protected $originState;
	protected $originCity;
	protected $products;

	public function __construct(
		$destinationPostalCode,
		$destinationCountry,
		$destinationCity,
		$originPostalCode,
		$originCountry,
		$originState,
		$originCity,
		$products
	)
	{
		$this->destinationPostalCode = $destinationPostalCode;
		$this->destinationCountry    = $destinationCountry;
		$this->destinationCity       = $destinationCity;
		$this->originPostalCode      = $originPostalCode;
		$this->originCountry 		 = $originCountry;
		$this->originState 			 = $originState;
		$this->originCity 			 = $originCity;
		$this->products 			 = $products;
	}

	public function getPricesShipping()
	{	
		$this->url  = $this->endpoint . 'shipping?token=' . $this->token;
		$this->data = $this->prepareAndGetDataShipping();

		return $this->post();
	}

	public function prepareAndGetDataShipping()
	{
		$response = [
			'destination_postal_code'=> $this->destinationPostalCode,
			'destination_country'    => $this->destinationCountry,
			'destination_city'       => $this->destinationCity,
			'origin_postal_code'     => $this->originPostalCode,
			'origin_country'         => $this->originCountry,
			'origin_state' 		     => $this->originState,
			'origin_city' 			 => $this->originCity,
			'products' 				 => $this->products,
		];

		return json_encode($response);
	}

}