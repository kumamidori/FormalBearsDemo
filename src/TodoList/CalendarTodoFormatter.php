<?php
declare(strict_types=1);
namespace Fob\FormalBearsDemo\TodoList;

use Fob\FormalBearsDemo\TodoList\Entity\CalendarTodo;
use Fob\FormalBearsDemo\TodoList\Entity\TodoInterface;

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
