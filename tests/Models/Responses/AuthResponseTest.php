<?php

namespace Tests\Responses;

use ninjacto\OrtcPhp\Models\Responses\AuthResponse;
use ninjacto\OrtcPhp\TestCase;

class AuthResponseTest extends TestCase
{
    public function testImplements()
    {
        $response = new AuthResponse();
        $this->assertAttributeEquals(true, 'failed', $response);
        $this->assertTrue($response->isFailed());

        $response->setFailed(1);
        $this->assertAttributeEquals(true, 'failed', $response);
        $this->assertTrue($response->isFailed());
    }
}
