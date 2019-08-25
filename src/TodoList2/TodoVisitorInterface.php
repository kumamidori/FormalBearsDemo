<?php
namespace Fob\FormalBearsDemo\TodoList2;

use Fob\FormalBearsDemo\TodoList2\Data\CalendarTodo;
use Fob\FormalBearsDemo\TodoList2\Data\NormalTodo;

interface TodoVisitorInterface
{
    public function visitNormalTodo(NormalTodo $data);
    public function visitCalendarTodo(CalendarTodo $data);
}
