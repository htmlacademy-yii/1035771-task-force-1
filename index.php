<?php

use app\logic\ActionStatus;

require_once 'vendor/autoload.php';

$actionStatus = new ActionStatus();

assert($actionStatus->getNewStatus(ActionStatus::ACTION_NEW) === ActionStatus::STATUS_NEW, 'при создании задачи возвращается статус "Новое"');

assert($actionStatus->getNewStatus(ActionStatus::ACTION_START) === ActionStatus::STATUS_PROCESS, 'при старте работы над задачей возвращает статус "В работе"');

assert($actionStatus->getNewStatus(ActionStatus::ACTION_FINISH) === ActionStatus::STATUS_DONE, 'при завершении работы возвращается статус "Выполнено"');

assert($actionStatus->getNewStatus(ActionStatus::ACTION_CANCEL) === ActionStatus::STATUS_CANCELED, 'при отмене задачи возвращается статус "Отменено"');

assert($actionStatus->getNewStatus(ActionStatus::ACTION_REFUSE) === ActionStatus::STATUS_FAILED, 'при отказе от выполения возвращается статус "Провалено"');
