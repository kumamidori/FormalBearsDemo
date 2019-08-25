<?php
declare(strict_types=1);
namespace Fob\FormalBearsDemo\Resource\App\Todolist2;

use BEAR\Resource\ResourceObject;
use Fob\FormalBearsDemo\TodoList2\Data\CalendarTodo;
use Fob\FormalBearsDemo\TodoList2\Data\Formattable;
use Fob\FormalBearsDemo\TodoList2\Data\NormalTodo;
use Fob\FormalBearsDemo\TodoList2\TextFormatter;

class Todolist extends ResourceObject
{
    /**
     * 実行手順:
     * $ php ./bin/app.php get 'app://self/todolist2/todolist'
     *
     * @return ResourceObject
     */
    public function onGet() : ResourceObject
    {
        $todoList = [
            new NormalTodo(),
            new CalendarTodo(),
            new NormalTodo(),
        ];

        $formatter = new TextFormatter();

        $this->body['text_lists'] = array_map(function (Formattable $data) use ($formatter) {
            return $data->formatWith($formatter);
        }, $todoList);

        return $this;
    }
}
