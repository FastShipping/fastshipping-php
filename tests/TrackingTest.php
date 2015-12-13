<?php

namespace FastShipping\Lib;

class TrackingTest extends \PHPUnit_Framework_TestCase
{
    protected $tracking;

    public function testTrackingResponseIsNotEmpty()
    {
        $this->tracking = new Tracking;
        $this->tracking->setCodeTracking('JO375581554BR');
        
        $this->assertNotEmpty($this->tracking->getTracking());
    }

    public function testTrackingOffCode()
    {    	
    	$this->setExpectedException('PHPUnit_Framework_Error');
        
        $this->tracking = new Tracking;
        $this->assertFalse($this->tracking->getTracking());
    }
}