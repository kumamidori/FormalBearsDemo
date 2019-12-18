<?php
namespace FormalBearsDemo\TodoList;

use FormalBearsDemo\TodoList\Entity\NormalTodo;
use PHPUnit\Framework\TestCase;

class NormalTodoFormatterTest extends TestCase
{
    private $SUT;

    protected function setUp(): void
    {
        parent::setUp();
        $this->SUT = new NormalTodoFormatter();
    }

    public function testFormat()
    {
        $fixture = new NormalTodo('abc', NormalTodo::STATUS_PENDING);
        $result = $this->SUT->format($fixture);
        $this->assertSame('[未着手] abc', $result);
    }
}
