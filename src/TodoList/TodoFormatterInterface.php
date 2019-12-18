<?php
declare(strict_types=1);
namespace FormalBearsDemo\TodoList;

use FormalBearsDemo\TodoList\Entity\TodoInterface;

interface TodoFormatterInterface
{
    public function format(TodoInterface $todo): string;
}
