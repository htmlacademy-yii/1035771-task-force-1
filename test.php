<?php
declare(strict_types=1);

ini_set('display_errors', 'On');
error_reporting(E_ALL);

use app\exception\WrongRoleException;
use app\models\actions\CompleteAction;
use app\models\actions\StartAction;
use app\models\Task;

require_once __DIR__.'/vendor/autoload.php';

$customer_id = 1;
$executor_id = 2;

$task = new Task($customer_id);
/*
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

*/


try {
    $task = new Task(2);
    $task->setExecutor(5);

    //$task->complete(2);
    $task->getAvailableActions(2);

} catch (\app\exception\ChangeStatusException $e) {
    echo $e->getMessage();
} catch (\app\exception\UnknownActionException $e) {
    echo $e->getMessage();
} catch (WrongRoleException $e) {
    echo $e->getMessage();
}

