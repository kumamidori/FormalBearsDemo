<?php
namespace FormalBearsDemo\Resource\App\Userlist;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    const URI = 'app://self/userlist/user';

    public function testOnGetCaseApp()
    {
        $fixtureCode = 200;
        $fixtureBody = ['id' => 123];

        $stubHandler = new MockHandler([
            new Response($fixtureCode, [], json_encode($fixtureBody)),
        ]);
        $stubStack = HandlerStack::create($stubHandler);
        $stubClient = new Client(['handler' => $stubStack]);

        /** @var User $SUT */
        $SUT = new User($stubClient, 'http://dummy');
        $resultRo = $SUT->onGet('dummy');

        $this->assertSame($resultRo->code, $fixtureCode);
        $this->assertEquals($resultRo->body, $fixtureBody);
    }
}
