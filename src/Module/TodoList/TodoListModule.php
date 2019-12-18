<?php
declare(strict_types=1);
namespace FormalBearsDemo\Module\TodoList;

use FormalBearsDemo\TodoList\Entity\CalendarTodo;
use FormalBearsDemo\TodoList\Entity\NormalTodo;
use FormalBearsDemo\TodoList\CalendarTodoFormatter;
use FormalBearsDemo\TodoList\NormalTodoFormatter;
use FormalBearsDemo\TodoList\Repository\TodoListQueryRepository;
use FormalBearsDemo\TodoList\TodoFormatterInterface;
use FormalBearsDemo\TodoList\TodoFormatterProvider;
use FormalBears\Foundation\Config\Module\AbstractConfigAwareModule;

class TodoListModule extends AbstractConfigAwareModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->defineExtensionPoint(TodoFormatterInterface::class, TodoFormatterProvider::class);
        $this->registerExtension(TodoFormatterInterface::class, NormalTodoFormatter::class, NormalTodo::class);
        $this->registerExtension(TodoFormatterInterface::class, CalendarTodoFormatter::class, CalendarTodo::class);

        $this->bind(TodoListQueryRepository::class);
    }

    /**
     * @return null|\FormalBears\Foundation\Config\Definition\ConfigurationInterface The tree builder
     */
    protected function getConfiguration()
    {
        return new TodoListConfiguration();
    }
}
