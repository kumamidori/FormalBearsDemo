<?php
declare(strict_types=1);
namespace Fob\FormalBearsDemo\TodoList2\Data;

use Fob\FormalBearsDemo\TodoList2\TodoFormatterInterface;

class NormalTodo implements Formattable
{
    public function getName(): string
    {
        return 'task 2';
    }

    public function formatWith(TodoFormatterInterface $formatter)
    {
        return $formatter->visitNormalTodo($this);
    }
}
