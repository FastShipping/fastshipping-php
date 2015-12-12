<?php

namespace FastShipping\Lib;

class HttpTest extends \PHPUnit_Framework_TestCase
{
    protected $http;

    public function testOne()
    {
        $this->http = new Http;
        // $this->assertEquals("https://fastshipping.ciawn.com.br/v1/", $this->http->endpoint);
    }
}