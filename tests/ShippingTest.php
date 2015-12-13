<?php

namespace FastShipping\Lib;

class ShippingTest extends \PHPUnit_Framework_TestCase
{
    protected $shipping;

    public function testPrepareAndGetDataShipping()
    {
        $products = [
            [
                "weight" => 0.34,
                "height" => 0.100,
                "length" => 10,
                "width" => 11.5,
                "unit_price" => 11.25,
                "quantity" => 1,
                "sku" => "MLBAFFJJ24342",
                "id" => "34343lkjdlksjfaskldf43bf"
            ],
            [
                "weight" => 0.34,
                "height" => 10,
                "length" => 10,
                "width" => 11.5,
                "unit_price" => 11.25,
                "quantity" => 1,
                "sku" => "MLBAFFJJ24342",
                "id" => "34343lkjdlksjfaskldf43bf"
            ]
        ];

        $this->shipping = new Shipping(
            '07252000',
            'BR',
            'Guarulhos',
            '',
            '',
            '',
            '',
            $products
        );

        $expected = '{"destination_postal_code":"07252000","destination_country":"BR","destination_city":"Guarulhos","origin_postal_code":"","origin_country":"","origin_state":"","origin_city":"","products":[{"weight":0.34,"height":0.1,"length":10,"width":11.5,"unit_price":11.25,"quantity":1,"sku":"MLBAFFJJ24342","id":"34343lkjdlksjfaskldf43bf"},{"weight":0.34,"height":10,"length":10,"width":11.5,"unit_price":11.25,"quantity":1,"sku":"MLBAFFJJ24342","id":"34343lkjdlksjfaskldf43bf"}]}';
        
        $this->assertEquals($expected, $this->shipping->prepareAndGetDataShipping());
    }

    public function testGetPricesWithErrorInHeightProduct()
    {
        $products = [
            [
                "weight" => 0.34,
                "height" => 0.100,
                "length" => 10,
                "width" => 11.5,
                "unit_price" => 11.25,
                "quantity" => 2,
                "sku" => "MLBAFFJJ24342",
                "id" => "34343lkjdlksjfaskldf43bf"
            ]
        ];

        $this->shipping = new Shipping(
            '07252000',
            'BR',
            'Guarulhos',
            '',
            '',
            '',
            '',
            $products
        );

        $response = $this->shipping->getPricesShipping();
        $codeExpected = '1';
        $msgExpected = 'A altura não pode ser inferior a 2 cm.';

        $this->assertEquals($codeExpected, $response[0]->error->code);
        $this->assertEquals($msgExpected, $response[0]->error->message);
    }
}