<?php
declare(strict_types=1);
namespace FormalBearsDemo\Resource\App\Todolist;

use BEAR\Resource\ResourceObject;
use FormalBearsDemo\TodoList\Entity\TodoInterface;
use FormalBearsDemo\TodoList\Repository\TodoListQueryRepository;
use FormalBearsDemo\TodoList\TodoFormatterInterface;
use FormalBearsDemo\TodoList\TodoFormatterProvider;
use Ray\Di\Di\Inject;

class Todolist extends ResourceObject
{
    /**
     * @var TodoFormatterProvider
     */
    private $todoFormatterProvider;

    /**
     * @var TodoListQueryRepository
     */
    private $todoRepository;

    /**
     * @Inject
     *
     * @param TodoFormatterProvider $todoFormatterProvider
     * @param TodoListQueryRepository $repo
     */
    public function __construct(TodoFormatterProvider $todoFormatterProvider, TodoListQueryRepository $repo)
    {
        $this->todoFormatterProvider = $todoFormatterProvider;
        $this->todoRepository = $repo;
    }

    /**
     * 実行手順:
     * $ php ./bin/app.php get 'app://self/todolist/todolist'
     *
     * @return ResourceObject
     */
    public function onGet(): self
    {
        $todoList = $this->todoRepository->findAll();
        $formatterProvider = $this->todoFormatterProvider;

        $this->body['list'] = array_map(function (TodoInterface $todo) use ($formatterProvider) {

            // TODOの種類によってどのフォーマッター実装クラスを使うのかを都度動的に決定
            $formatterProvider->setContext(get_class($todo));
            /** @var TodoFormatterInterface $formatter */
            $formatter = $formatterProvider->get();

            return $formatter->format($todo);
        }, $todoList);

        return $this;
    }
}
