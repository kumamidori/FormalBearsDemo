<?php
declare(strict_types=1);
namespace Fob\FormalBearsDemo\Resource\App\Todolist2;

use BEAR\Resource\ResourceObject;
use Fob\FormalBearsDemo\TodoList\CalendarTodoFormatter;
use Fob\FormalBearsDemo\TodoList\Entity\TodoInterface;
use Fob\FormalBearsDemo\TodoList\TodoFormatterInterface;
use Fob\FormalBearsDemo\TodoList\Entity\CalendarTodo;
use Fob\FormalBearsDemo\TodoList\Entity\NormalTodo;
use Monolog\Formatter\NormalizerFormatter;

class Todolist extends ResourceObject
{
    private $normalFormatter;

    private $calendarFormatter;

    public function __construct(NormalizerFormatter $nf, CalendarTodoFormatter $cf)
    {
        $this->normalFormatter = $nf;
        $this->calendarFormatter = $cf;
    }

    /**
     * 実行手順:
     * $ php ./bin/app.php get 'app://self/todolist3/todolist'
     *
     * @return ResourceObject
     */
    public function onGet() : ResourceObject
    {
        $todoList = [
            new NormalTodo('normal-title hello', NormalTodo::STATUS_WORKING),
            new CalendarTodo('calendar-title hello', new \DateTime('2019-08-24 15:00:00')),
            new NormalTodo('normal-title2', NormalTodo::STATUS_PENDING),
        ];

        $this->body['lists'] = array_map(function (TodoInterface $todo) {
            /** @var TodoFormatterInterface $formatter */
            $formatter = null;
            switch (get_class($todo)) {
                case NormalTodo::class:
                    $formatter = $this->normalFormatter;
                    break;
                case CalendarTodo::class:
                    $formatter = $this->calendarFormatter;
                    break;
                default :
                    throw new \LogicException();
            }
            return $formatter->format($todo);
        }, $todoList);

        return $this;
    }
}
