<?php

namespace Tests\Handlers;

use Mockery as m;
use ninjacto\OrtcPhp\Handlers\AuthResponseHandler;
use ninjacto\OrtcPhp\TestCase;

class AuthResponseHandlerTest extends TestCase
{
    public function testImplementsAndHandle()
    {
        $handler = new AuthResponseHandler();
        $this->assertInstanceOf('ninjacto\OrtcPhp\Handlers\OrtcResponseHandler', $handler);

        $futureResponse = m::mock('FutureResponse');
        $response = $handler->handle($futureResponse);
        $this->assertInstanceOf('ninjacto\OrtcPhp\Models\Responses\AuthResponse', $response);
        $this->assertFalse($response->isFailed());
    }
}
