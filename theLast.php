<?php

use app\logic\CreateArray;
use app\models\Category;
use app\models\Location;
use app\models\Task;
use app\models\User;

require_once 'vendor/autoload.php';

$cat = new SplFileObject('data\categories.csv');
$cat->setFlags(SplFileObject::READ_CSV | SplFileObject::READ_AHEAD | SplFileObject::SKIP_EMPTY | SplFileObject::DROP_NEW_LINE);
foreach ($cat as $row) {
    $handle = fopen('data\categories.csv', 'r');
    $header = fgetcsv($handle);
    $y = array_combine($header, $row);
    $queryBuild = new \app\logic\QueryBuilder('categories', $y);
    $sql = $queryBuild->getSql();
    var_dump($sql);
}

$user = new SplFileObject('data\users.csv');
$user->setFlags(SplFileObject::READ_CSV | SplFileObject::READ_AHEAD | SplFileObject::SKIP_EMPTY | SplFileObject::DROP_NEW_LINE);
foreach ($user as $row) {
    $handle = fopen('data\users.csv', 'r');
    $header = fgetcsv($handle);
    $y = array_combine($header, $row);
    $queryBuild = new \app\logic\QueryBuilder('users', $y);
    $sql = $queryBuild->getSql();
    var_dump($sql);
}

$messages = new SplFileObject('data\messages.csv');
$messages->setFlags(SplFileObject::READ_CSV | SplFileObject::READ_AHEAD | SplFileObject::SKIP_EMPTY | SplFileObject::DROP_NEW_LINE);
foreach ($messages as $row) {
    $handle = fopen('data\messages.csv', 'r');
    $header = fgetcsv($handle);
    $y = array_combine($header, $row);
    $queryBuild = new \app\logic\QueryBuilder('user_messages', $y);
    $sql = $queryBuild->getSql();
    var_dump($sql);
}
