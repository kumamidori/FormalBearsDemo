<?php
declare(strict_types=1);
namespace Fob\FormalBearsDemo\TodoList;

use FormalBears\Foundation\Di\ExtensionPoint;
use Ray\Di\Di\Named;
use Ray\Di\InjectorInterface;

class TodoPresenterProviderFactory
{
    /**
     * @var InjectorInterface
     */
    private $injector;

    /**
     * @var ExtensionPoint
     */
    private $extensionPoint;

    /**
     * @param InjectorInterface $injector
     * @param ExtensionPoint    $extensionPoint
     *
     * @Named("extensionPoint=Fob\FormalBearsDemo\TodoList\TodoPresenterInterface")
     */
    public function __construct(InjectorInterface $injector, ExtensionPoint $extensionPoint)
    {
        $this->injector = $injector;
        $this->extensionPoint = $extensionPoint;
    }

    public function newInstance()
    {
        return new TodoPresenterProvider($this->injector, $this->extensionPoint);
    }
}
