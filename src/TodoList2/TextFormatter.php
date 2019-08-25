<?php
declare(strict_types=1);
namespace Fob\FormalBearsDemo\TodoList2;


use Fob\FormalBearsDemo\TodoList2\Data\CalendarTodo;
use Fob\FormalBearsDemo\TodoList2\Data\NormalTodo;

class TextFormatter implements TodoFormatterInterface
{

    public function visitNormalTodo(NormalTodo $data)
    {
        return sprintf('hello %s normal todo!', $data->getName());
    }

    public function visitCalendarTodo(CalendarTodo $data)
    {
        return sprintf('hello %s calendar todo!', $data->getName());
    }
}
