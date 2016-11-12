<?php

namespace Test\Configs;

use ninjacto\OrtcPhp\Configs\OrtcConfig;
use ninjacto\OrtcPhp\TestCase;

class OrtcConfigTest extends TestCase
{
    /**
     * @dataProvider providerAttributesDefault
     * @param $attribute
     * @param $value
     */
    public function testAttributesDefault($attribute, $value)
    {
        $ortcConfig = new OrtcConfig();

        $methodGet = 'get'.ucfirst($attribute);
        $this->assertEquals($value, $ortcConfig->{$methodGet}());
        $this->assertAttributeEquals($value, $attribute, $ortcConfig);
    }

    public function providerAttributesDefault()
    {
        return [
            ['balancedUrl', 'https://ortc-developers.realtime.co/server/2.1?appkey={APP_KEY}'],
            ['applicationKey', null],
            ['privateKey', null],
            ['authenticationPath', '/authenticate'],
            ['sendPath', '/send'],
            ['maxChunkSize', 700],
            ['batchPoolSize', 5],
            ['preMessageString', '{RANDOM}_{PART}-{TOTAL_PARTS}_'],
        ];
    }

    /**
     * @dataProvider providerSetAttributes
     * @param $attribute
     * @param $value
     */
    public function testSetAttributes($attribute, $value)
    {
        $ortcConfig = new OrtcConfig();

        $methodSet = 'set'.ucfirst($attribute);
        $ortcConfig->{$methodSet}($value);

        $methodGet = 'get'.ucfirst($attribute);
        $this->assertEquals($value, $ortcConfig->{$methodGet}());
        $this->assertAttributeEquals($value, $attribute, $ortcConfig);
    }

    public function providerSetAttributes()
    {
        return [
            ['balancedUrl', 'https://ortc-developers.realtime.co/server/2.1?appkey=123456'],
            ['applicationKey', 'abcede'],
            ['privateKey', '123456'],
            ['authenticationPath', '/auth'],
            ['sendPath', '/enviar'],
            ['maxChunkSize', 100],
            ['batchPoolSize', 20],
            ['preMessageString', '{OTHER}_{PART}-{TOTAL_PARTS}_'],
        ];
    }

    public function testAttributeVerifySsl()
    {
        $ortcConfig = new OrtcConfig();

        $this->assertTrue($ortcConfig->isVerifySsl());
        $this->assertAttributeEquals(true, 'verifySsl', $ortcConfig);

        $ortcConfig->setVerifySsl(0);
        $this->assertFalse($ortcConfig->isVerifySsl());
        $this->assertAttributeEquals(false, 'verifySsl', $ortcConfig);
    }
}
