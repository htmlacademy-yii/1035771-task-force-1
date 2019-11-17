<?php


namespace app\models\actions;

use app\models\Task;

class ProposeAction extends AbstractAction
{
    public static function getName(): string
    {
        return self::class;
    }


    public static function getCode(): string
    {
        return 'action_propose';
    }

    public static function verifyAbility(int $initiator_id, Task $task): bool
    {
        if ($task->getExecutor()) {
             return false;
        }

        if ($task->getCustomer() === $initiator_id) {
            return false;
        }

        if ($task->getStatus() !== Task::STATUS_NEW) {
            return false;
        }

        return true;
    }
}
