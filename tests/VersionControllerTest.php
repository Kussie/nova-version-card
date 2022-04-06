<?php

namespace Kussie\VersionCard\Tests;

class VersionControllerTest extends TestCase
{
    /** @test */
    public function it_returns_system_information()
    {
        $content = $this->get('nova-vendor/kussie/nova-version-card/versions')
            ->getContent();

        $systemInfo = json_decode($content, true);

        $this->assertSame(app()->version(), $systemInfo['laravel']);
    }
}
