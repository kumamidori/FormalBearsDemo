<?php
declare(strict_types=1);
namespace Fob\FormalBearsDemo\TodoList2\Data;

use Fob\FormalBearsDemo\TodoList2\TodoFormatterInterface;

class CalendarTodo implements Formattable
{
    public function getName(): string
    {
        return 'calendar event 1';
    }

    public function formatWith(TodoFormatterInterface $formatter)
    {
        return $formatter->visitCalendarTodo($this);
    }
}
