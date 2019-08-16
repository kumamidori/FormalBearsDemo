<?php
declare(strict_types=1);
namespace Fob\FormalBearsDemo\TodoList;

use Fob\FormalBearsDemo\TodoList\Entity\TodoInterface;

interface TodoFormatterInterface
{
    public function format(TodoInterface $todo): string;
}
