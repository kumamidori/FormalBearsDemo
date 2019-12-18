<?php
namespace FormalBearsDemo\TodoList;

use FormalBearsDemo\TodoList\Entity\CalendarTodo;
use PHPUnit\Framework\TestCase;

class CalendarTodoFormatterTest extends TestCase
{
    private $SUT;

    protected function setUp(): void
    {
        parent::setUp();
        $this->SUT = new CalendarTodoFormatter();
    }

    public function testFormat()
    {
        $fixture = new CalendarTodo('foo', new \DateTime('2019-08-24 15:00:00'));
        $result = $this->SUT->format($fixture);
        $this->assertSame('[8/24 15時] foo', $result);
    }
}
