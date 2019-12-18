<?php
declare(strict_types=1);
namespace FormalBearsDemo\TodoList\Entity;

final class NormalTodo implements TodoInterface
{
    // 例なので簡単にしてある
    const STATUS_PENDING = 'pending';
    const STATUS_WORKING = 'working';
    const STAUTS_COMPLETE = 'complete';

    private $title;

    private $status;

    public function __construct(string $title, string $status)
    {
        $this->title = $title;
        $this->status = $status;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
}
