<?php
declare(strict_types=1);
namespace Fob\FormalBearsDemo\Resource\App\Todolist;

use BEAR\Resource\ResourceObject;
use Fob\FormalBearsDemo\TodoList\Entity\GoogleCalendarTodo;
use Fob\FormalBearsDemo\TodoList\Entity\NormalTodo;
use Fob\FormalBearsDemo\TodoList\TodoPresenterInterface;
use Fob\FormalBearsDemo\TodoList\TodoPresenterProviderFactory;

class Todolist extends ResourceObject
{
    /**
     * @var TodoPresenterProviderFactory
     */
    private $providerFactory;

    public function __construct(TodoPresenterProviderFactory $f)
    {
        $this->providerFactory = $f;
    }

    /**
     * 実行手順:
     * $ php ./bin/app.php get 'app://self/index'
     *
     * @return ResourceObject
     */
    public function onGet() : ResourceObject
    {
        $provider = $this->providerFactory->newInstance();

        // 実際にはリポジトリから取得する
        $normalTodo = new NormalTodo();
        $googleTodo = new GoogleCalendarTodo();

        $provider->setContext(get_class($normalTodo));
        /** @var TodoPresenterInterface $todoPresenter */
        $todoPresenter = $provider->get();
        $provider->setContext(get_class($googleTodo));
        $googlePresenter = $provider->get();
        $todoResult = $todoPresenter->present($normalTodo);
        $googleResult = $googlePresenter->present($normalTodo);
        $this->body['normal_todo'] = $todoResult;
        $this->body['google_todo'] = $googleResult;

        return $this;
    }
}
