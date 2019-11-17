<?php


use app\models\Task;
require_once __DIR__.'/vendor/autoload.php';
$customer_id = 1;
$executor_id = 2;


$task = new Task($customer_id);

$availableActions = $task->getAvailableActions($customer_id);
print_r($availableActions);

$availableActions = $task->getAvailableActions($executor_id);
print_r($availableActions);

$task->setExecutor($executor_id);
$task->start($customer_id);
$availableActions = $task->getAvailableActions($customer_id);
print_r($availableActions);

$availableActions = $task->getAvailableActions($executor_id);
print_r($availableActions);

$task->complete($customer_id);
$availableActions = $task->getAvailableActions($executor_id);
print_r($availableActions);

$availableActions = $task->getAvailableActions($customer_id);
print_r($availableActions);
