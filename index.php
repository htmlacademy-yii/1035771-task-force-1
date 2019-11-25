<?php

use app\models\actions\CancelAction;
use app\models\actions\CompleteAction;
use app\models\actions\RefuseAction;
use app\models\actions\StartAction;
use app\models\Task;

require_once 'vendor/autoload.php';

    $availableAction = new Task(1);

    assert($availableAction->getNewStatus(StartAction::getName()) === Task::STATUS_PROCESS, 'при старте работы над задачей возвращает статус "В работе"');

    assert($availableAction->getNewStatus(CompleteAction::getName()) === Task::STATUS_COMPLETED, 'при завершении работы возвращается статус "Выполнено"');

    assert($availableAction->getNewStatus(CancelAction::getName()) === Task::STATUS_CANCELED, 'при отмене задачи возвращается статус "Отменено"');

    assert($availableAction->getNewStatus(RefuseAction::getName()) === Task::STATUS_FAILED, 'при отказе от выполения возвращается статус "Провалено"');
