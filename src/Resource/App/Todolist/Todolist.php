<?php
declare(strict_types=1);
namespace Fob\FormalBearsDemo\Resource\App\Todolist;

use BEAR\Resource\ResourceObject;
use Fob\FormalBearsDemo\TodoList\Entity\TodoInterface;
use Fob\FormalBearsDemo\TodoList\Repository\TodoListQueryRepository;
use Fob\FormalBearsDemo\TodoList\TodoFormatterInterface;
use Fob\FormalBearsDemo\TodoList\TodoFormatterProviderFactory;
use Ray\Di\Di\Inject;

class Todolist extends ResourceObject
{
    /**
     * @var TodoFormatterProviderFactory
     */
    private $providerFactory;

    /**
     * @var TodoListQueryRepository
     */
    private $todoRepository;

    /**
     * @Inject
     *
     * @param TodoFormatterProviderFactory $factory
     * @param TodoListQueryRepository $repo
     */
    public function __construct(TodoFormatterProviderFactory $factory, TodoListQueryRepository $repo)
    {
        $this->providerFactory = $factory;
        $this->todoRepository = $repo;
    }

    /**
     * 実行手順:
     * $ php ./bin/app.php get 'app://self/index'
     *
     * @return ResourceObject
     */
    public function onGet() : ResourceObject
    {
        $todoList = $this->todoRepository->findAll();
        $formatterProvider = $this->providerFactory->newInstance();

        $this->body['lists'] = array_map(function (TodoInterface $todo) use ($formatterProvider) {
            $formatterProvider->setContext(get_class($todo));
            /** @var TodoFormatterInterface $formatter */
            $formatter = $formatterProvider->get();
            return $formatter->format($todo);
        }, $todoList);

        return $this;
    }
}
