<?php


namespace app\models\actions;

use app\models\Task;

class CancelAction extends AbstractAction
{
    public static function getName(): string
    {
        return self::class;
    }

    public static function getCode(): string
    {
        return 'action_cancel';
    }

    public static function verifyAbility(int $initiator_id, Task $task): bool
    {
        if ($task->getStatus() !== Task::STATUS_NEW) {
            return false;
        }

        if ($initiator_id !==  $task->getCustomer()) {
            return false;
        }

        return true;
    }
}
