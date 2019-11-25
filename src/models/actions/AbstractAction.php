<?php


namespace app\models\actions;

use app\models\Task;

abstract class AbstractAction
{
    abstract static function getName(): string;

    abstract static function getCode(): string;

    abstract static function verifyAbility(int $initiator_id, Task $task): string;
}
