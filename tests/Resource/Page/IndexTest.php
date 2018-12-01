<?php
namespace Fob\FormalBearsDemo\Resource\Page;

use BEAR\Package\AppInjector;
use BEAR\Resource\ResourceInterface;
use PHPUnit\Framework\TestCase;

class IndexTest extends TestCase
{
    const URI = 'page://self/index';

    const QUERY = ['name' => 'BEAR.Sunday'];

    const EXPECT_GREETING = 'Hello BEAR.Sunday';

    public function testOnGetCaseApp()
    {
        $resource = $this->getResourceBy('app');
        $ro = $resource->get(self::URI, self::QUERY);

        $this->assertSame(200, $ro->code);
        $this->assertSame(self::EXPECT_GREETING, $ro->body['greeting']);
    }

    private function getResourceBy(string $context)
    {
        return (new AppInjector('Fob\FormalBearsDemo', $context))->getInstance(ResourceInterface::class);
    }
}
