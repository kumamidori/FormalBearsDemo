<?php
namespace Fob\FormalBearsDemo\TodoList;

use Fob\FormalBearsDemo\TodoList\Entity\CalendarTodo;
use Fob\FormalBearsDemo\TodoList\Entity\NormalTodo;
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
