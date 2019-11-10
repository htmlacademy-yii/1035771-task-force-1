<?php

use app\logic\AvailableActions;

require_once 'vendor/autoload.php';

$availableAction = new AvailableActions();

assert($availableAction->getNewStatus(\app\logic\NewAction::class) === AvailableActions::STATUS_NEW, 'при создании задачи возвращается статус "Новое"');

assert($availableAction->getNewStatus(\app\logic\StartAction::class) === AvailableActions::STATUS_PROCESS, 'при старте работы над задачей возвращает статус "В работе"');

assert($availableAction->getNewStatus(\app\logic\CompleteAction::class) === AvailableActions::STATUS_DONE, 'при завершении работы возвращается статус "Выполнено"');

assert($availableAction->getNewStatus(\app\logic\CancelAction::class) === AvailableActions::STATUS_CANCELED, 'при отмене задачи возвращается статус "Отменено"');

assert($availableAction->getNewStatus(\app\logic\RefuseAction::class) === AvailableActions::STATUS_FAILED, 'при отказе от выполения возвращается статус "Провалено"');


$showMeList = new AvailableActions();
assert($showMeList ->showAllActions(AvailableActions::ROLE_EXECUTOR, 1));

