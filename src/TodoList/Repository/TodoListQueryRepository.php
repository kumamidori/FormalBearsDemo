<?php
declare(strict_types=1);
namespace FormalBearsDemo\TodoList\Repository;

use FormalBearsDemo\TodoList\Entity\CalendarTodo;
use FormalBearsDemo\TodoList\Entity\NormalTodo;

class TodoListQueryRepository
{
    public function findAll()
    {
        // 例なので簡単にしてある
        return [
            new NormalTodo('normal-title hello', NormalTodo::STATUS_WORKING),
            new CalendarTodo('calendar-title hello', new \DateTime('2019-08-24 15:00:00')),
            new NormalTodo('normal-title2', NormalTodo::STATUS_PENDING),
        ];
    }
}
