<?php
declare(strict_types=1);
namespace Fob\FormalBearsDemo\Module\TodoList;

use Fob\FormalBearsDemo\TodoList\Entity\GoogleCalendarTodo;
use Fob\FormalBearsDemo\TodoList\Entity\NormalTodo;
use Fob\FormalBearsDemo\TodoList\GoogleCalendarTodoPresenter;
use Fob\FormalBearsDemo\TodoList\NormalTodoPresenter;
use Fob\FormalBearsDemo\TodoList\TodoPresenterInterface;
use Fob\FormalBearsDemo\TodoList\TodoPresenterProvider;
use FormalBears\Foundation\Config\Module\AbstractConfigAwareModule;

class TodoListModule extends AbstractConfigAwareModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->defineExtensionPoint(TodoPresenterInterface::class, TodoPresenterProvider::class);
        $this->registerExtension(TodoPresenterInterface::class, NormalTodoPresenter::class, NormalTodo::class);
        $this->registerExtension(TodoPresenterInterface::class, GoogleCalendarTodoPresenter::class, GoogleCalendarTodo::class);
    }

    /**
     * @return null|\FormalBears\Foundation\Config\Definition\ConfigurationInterface The tree builder
     */
    protected function getConfiguration()
    {
        return new TodoListConfiguration();
    }
}
