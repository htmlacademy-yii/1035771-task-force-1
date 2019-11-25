<?php


namespace app\models\actions;

use app\exception\WrongRoleException;
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

    /**
     * @param int $initiator_id
     * @param Task $task
     * @return string
     * @throws WrongRoleException
     */
    public static function verifyAbility(int $initiator_id, Task $task): string
    {
        if ($task->getExecutor()) {
            return false;
        }

        if ($task->getCustomer() === $initiator_id) {
            throw new WrongRoleException('Роль не соответствует инициатору');
        }

        if ($task->getStatus() !== Task::STATUS_NEW) {
            return false;
        }
        return true;
    }
}
