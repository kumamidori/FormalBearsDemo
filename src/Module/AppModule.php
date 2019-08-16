<?php
namespace Fob\FormalBearsDemo\Module;

use BEAR\Package\PackageModule;
use Fob\FormalBearsDemo\Module\HttpClient\HttpClientModule;
use Fob\FormalBearsDemo\Module\TodoList\TodoListModule;
use Fob\FormalBearsDemo\Module\UserList\UserListModule;
use FormalBears\Framework\Module\AbstractAppModule;

class AppModule extends AbstractAppModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->install(new PackageModule);
        $this->install(new UserListModule($this->registry));
        $this->install(new TodoListModule($this->registry));
        $this->install(new HttpClientModule);
    }

    /**
     * @return string
     */
    protected function getAppNamespace(): string
    {
        return 'Fob\\FormalBearsDemo';
    }

    /**
     * @return string
     */
    protected function getAppDir(): string
    {
        return dirname(__DIR__, 2);
    }

    /**
     * @return string
     */
    protected function getConfigExtension(): string
    {
        return '.yaml';
    }
}
