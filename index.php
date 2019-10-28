<?php

require_once 'classes\ActionStatus.php';

$test = new classes\ActionStatus();
$result = $test ->listActs();

$test2 = new classes\ActionStatus();
$result2 = $test2 ->listStatus();

$test3 = new classes\ActionStatus();
$result3 = $test3 ->NewStatus1();

var_dump($result, $result2, $result3);






