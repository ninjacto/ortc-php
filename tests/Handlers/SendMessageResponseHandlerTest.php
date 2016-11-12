<?php

namespace Tests\Handlers;

use Mockery as m;
use ninjacto\OrtcPhp\Handlers\SendMessageResponseHandler;
use ninjacto\OrtcPhp\TestCase;

class SendMessageResponseHandlerTest extends TestCase
{
    public function testImplementsAndHandle()
    {
        $handler = new SendMessageResponseHandler();
        $this->assertInstanceOf('ninjacto\OrtcPhp\Handlers\OrtcResponseHandler', $handler);

        $results = m::mock('GuzzleHttp\BatchResults');
        $response = $handler->handle($results);
        $this->assertInstanceOf('ninjacto\OrtcPhp\Models\Responses\SendMessageResponse', $response);
        $this->assertEquals($results, $response->getResults());
    }
}
