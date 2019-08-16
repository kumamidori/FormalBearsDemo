<?php
declare(strict_types=1);
namespace Fob\FormalBearsDemo\Module\TodoList;

use Fob\FormalBearsDemo\TodoList\Entity\CalendarTodo;
use Fob\FormalBearsDemo\TodoList\Entity\NormalTodo;
use Fob\FormalBearsDemo\TodoList\CalendarTodoFormatter;
use Fob\FormalBearsDemo\TodoList\NormalTodoFormatter;
use Fob\FormalBearsDemo\TodoList\Repository\TodoListQueryRepository;
use Fob\FormalBearsDemo\TodoList\TodoFormatterInterface;
use Fob\FormalBearsDemo\TodoList\TodoFormatterProvider;
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
