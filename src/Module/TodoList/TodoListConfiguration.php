<?php
declare(strict_types=1);
namespace FormalBearsDemo\Module\TodoList;

use FormalBears\Foundation\Config\Definition\AbstractConfiguration;
use Symfony\Component\Config\Definition\Builder\NodeBuilder;

class TodoListConfiguration extends AbstractConfiguration
{
    /**
     * {@inheritdoc}
     */
    public function getNamespace(): string
    {
        return 'todo_list';
    }

    /**
     * {@inheritdoc}
     */
    protected function defineChildren(NodeBuilder $nodeBuilder): NodeBuilder
    {
        $nodeBuilder
            ->end()
        ;

        return $nodeBuilder;
    }
}
