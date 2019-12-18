<?php
declare(strict_types=1);
namespace FormalBearsDemo\TodoList;

use FormalBearsDemo\TodoList\Entity\CalendarTodo;
use FormalBearsDemo\TodoList\Entity\TodoInterface;

class CalendarTodoFormatter implements TodoFormatterInterface
{
    public function format(TodoInterface $todo): string
    {
        if (! ($todo instanceof CalendarTodo)) {
            throw new \LogicException();
        }
        return sprintf(
            '[%s] %s',
            $this->formatStatus($todo),
            $todo->getTitle()
        );
    }

    private function formatStatus(CalendarTodo $todo): string
    {
        return $todo->getStartDateTime()->format('n/j H時');
    }
}
