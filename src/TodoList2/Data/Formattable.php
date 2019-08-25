<?php
namespace Fob\FormalBearsDemo\TodoList2\Data;

use Fob\FormalBearsDemo\TodoList2\TodoFormatterInterface;

interface Formattable
{
    public function formatWith(TodoFormatterInterface $formatter);
}
