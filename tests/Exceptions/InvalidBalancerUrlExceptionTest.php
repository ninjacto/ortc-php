<?php

namespace Tests\Exceptions;

use ninjacto\OrtcPhp\Exceptions\InvalidBalancerUrlException;
use ninjacto\OrtcPhp\TestCase;

class InvalidBalancerUrlExceptionTest extends TestCase
{
    public function testImplements()
    {
        $exception = new InvalidBalancerUrlException();
        $this->assertEquals('Balancer URL is invalid', $exception->getMessage());

        $this->assertAttributeEquals(null, 'url', $exception);
        $this->assertEquals(null, $exception->getUrl());

        $url = ['value' => 1];
        $exception->setUrl($url);
        $this->assertAttributeEquals($url, 'url', $exception);
        $this->assertEquals($url, $exception->getUrl());
    }
}
