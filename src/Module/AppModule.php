<?php
namespace Fob\FormalBearsDemo\Module;

use BEAR\Package\PackageModule;
use FormalBears\Framework\Module\AbstractAppModule;

class AppModule extends AbstractAppModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->install(new PackageModule);
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
