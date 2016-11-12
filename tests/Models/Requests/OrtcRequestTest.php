<?php

namespace Tests\Models\Requests;

use Mockery as m;
use ninjacto\OrtcPhp\Configs\OrtcConfig;
use ninjacto\OrtcPhp\TestCase;

class OrtcRequestTest extends TestCase
{
    public function testImplementsDefault()
    {
        $request = m::mock('ninjacto\OrtcPhp\Models\Requests\OrtcRequest[]');
        $ortcConfig = new OrtcConfig();

        $this->assertEquals($request, $request->setOrtcConfig($ortcConfig));
        $this->assertEquals($ortcConfig, $request->getOrtcConfig());

        $this->assertFalse($request->isUrlAbsolute());
    }
}
