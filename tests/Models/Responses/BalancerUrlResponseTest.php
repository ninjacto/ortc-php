<?php

namespace Tests\Responses;

use ninjacto\OrtcPhp\Models\Responses\BalancerUrlResponse;
use ninjacto\OrtcPhp\TestCase;

class BalancerUrlResponseTest extends TestCase
{
    public function testImplements()
    {
        $response = new BalancerUrlResponse();
        $this->assertAttributeEquals(null, 'url', $response);
        $this->assertEquals(null, $response->getUrl());

        $url = 'http://localhost';
        $response->setUrl($url);
        $this->assertAttributeEquals($url, 'url', $response);
        $this->assertEquals($url, $response->getUrl());
    }
}
