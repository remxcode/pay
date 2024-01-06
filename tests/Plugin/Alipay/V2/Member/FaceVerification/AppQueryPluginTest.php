<?php

namespace Yansongda\Pay\Tests\Plugin\Alipay\V2\Member\FaceVerification;

use Yansongda\Pay\Direction\ResponseDirection;
use Yansongda\Pay\Plugin\Alipay\V2\Member\FaceVerification\AppQueryPlugin;
use Yansongda\Pay\Rocket;
use Yansongda\Pay\Tests\TestCase;

class AppQueryPluginTest extends TestCase
{
    protected AppQueryPlugin $plugin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->plugin = new AppQueryPlugin();
    }

    public function testNormal()
    {
        $rocket = (new Rocket())
            ->setParams([]);

        $result = $this->plugin->assembly($rocket, function ($rocket) { return $rocket; });

        self::assertNotEquals(ResponseDirection::class, $result->getDirection());
        self::assertStringContainsString('datadigital.fincloud.generalsaas.face.verification.query', $result->getPayload()->toJson());
    }
}