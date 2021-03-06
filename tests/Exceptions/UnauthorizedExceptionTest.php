<?php

namespace Tests\Exceptions;

use ninjacto\OrtcPhp\Exceptions\UnauthorizedException;
use ninjacto\OrtcPhp\TestCase;

class UnauthorizedExceptionTest extends TestCase
{
    public function testImplements()
    {
        $exception = new UnauthorizedException();
        $this->assertEquals('Unauthorized Access', $exception->getMessage());
    }
}
