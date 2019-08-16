<?php
declare(strict_types=1);
namespace Fob\FormalBearsDemo\TodoList;

use Fob\FormalBearsDemo\TodoList\Entity\TodoInterface;

class NormalTodoPresenter implements TodoPresenterInterface
{
    public function present(TodoInterface $todo)
    {
        // TODO: Implement present() method.
        return 'normal';
    }
}
