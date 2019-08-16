<?php
declare(strict_types=1);
namespace Fob\FormalBearsDemo\TodoList;

use Fob\FormalBearsDemo\TodoList\Entity\NormalTodo;
use Fob\FormalBearsDemo\TodoList\Entity\TodoInterface;

class NormalTodoFormatter implements TodoFormatterInterface
{
    public function format(TodoInterface $todo): string
    {
        if (! ($todo instanceof NormalTodo)) {
            throw new \LogicException();
        }
        return sprintf(
            '[%s] %s',
            $this->formatStatus($todo),
            $todo->getTitle()
            );
    }

    private function formatStatus(NormalTodo $todo): string
    {
        // 例なので簡単にしてある
        $statusLabel = [
            NormalTodo::STATUS_PENDING => '未着手',
            NormalTodo::STATUS_WORKING => '進行中',
            NormalTodo::STAUTS_COMPLETE => '完了',
        ];

        return $statusLabel[$todo->getStatus()];
    }
}
