<?php
declare(strict_types=1);
namespace Fob\FormalBearsDemo\TodoList;

use FormalBears\Foundation\Di\ExtensionPoint;
use Ray\Di\Di\Named;
use Ray\Di\InjectorInterface;
use Ray\Di\ProviderInterface;
use Ray\Di\SetContextInterface;

class TodoPresenterProvider implements ProviderInterface, SetContextInterface
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
     * @var string
     */
    private $todo;

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

    /**
     * {@inheritdoc}
     */
    public function setContext($context)
    {
        $this->todo = $context;
    }

    /**
     * {@inheritdoc}
     */
    public function get()
    {
        if ($this->todo === null) {
            throw new \LogicException();
        }

        return $this->extensionPoint->getExtensionInstance($this->injector, $this->todo);
    }
}
