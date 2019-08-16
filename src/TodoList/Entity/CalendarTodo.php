<?php
declare(strict_types=1);
namespace Fob\FormalBearsDemo\TodoList\Entity;

final class CalendarTodo implements TodoInterface
{
    private $title;

    private $startDateTime;

    public function __construct(string $title, \DateTime $dt)
    {
        $this->title = $title;
        $this->startDateTime = $dt;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getStartDateTime(): \DateTime
    {
        return $this->startDateTime;
    }
}
