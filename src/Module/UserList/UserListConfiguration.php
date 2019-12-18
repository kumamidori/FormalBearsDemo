<?php
declare(strict_types=1);
namespace FormalBearsDemo\Module\UserList;

use FormalBears\Foundation\Config\Definition\AbstractConfiguration;
use Symfony\Component\Config\Definition\Builder\NodeBuilder;

class UserListConfiguration extends AbstractConfiguration
{
    /**
     * @return string
     */
    public function getNamespace(): string
    {
        return 'user_list';
    }

    /**
     * {@inheritdoc}
     */
    protected function defineChildren(NodeBuilder $nodeBuilder): NodeBuilder
    {
        $nodeBuilder
                ->scalarNode('api_base_url')->isRequired()->end()
                ->arrayNode('names')->isRequired()->scalarPrototype()->end()
            ->end();

        return $nodeBuilder;
    }
}
