<?php

use app\logic\AvailableActions;
use app\logic\CancelAction;
use app\logic\CompleteAction;
use app\logic\NewAction;
use app\logic\ProposeAction;
use app\logic\RefuseAction;
use app\logic\StartAction;

require_once 'vendor/autoload.php';

$availableAction = new AvailableActions();

assert($availableAction->getNewStatus(AvailableActions::ACTION_NEW) === AvailableActions::STATUS_NEW, 'при создании задачи возвращается статус "Новое"');

assert($availableAction->getNewStatus(\app\logic\StartAction::class) === AvailableActions::STATUS_PROCESS, 'при старте работы над задачей возвращает статус "В работе"');

assert($availableAction->getNewStatus(\app\logic\CompleteAction::class) === AvailableActions::STATUS_COMPLETED, 'при завершении работы возвращается статус "Выполнено"');

assert($availableAction->getNewStatus(\app\logic\CancelAction::class) === AvailableActions::STATUS_CANCELED, 'при отмене задачи возвращается статус "Отменено"');

assert($availableAction->getNewStatus(\app\logic\RefuseAction::class) === AvailableActions::STATUS_FAILED, 'при отказе от выполения возвращается статус "Провалено"');


$showMeList = new AvailableActions();
assert($showMeList ->showAllActions(AvailableActions::ROLE_EXECUTOR, 0), 'доступные действия...');

