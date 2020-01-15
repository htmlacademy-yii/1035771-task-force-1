<?php

use app\logic\CategorySqlFileCreator;
use app\logic\LocationSqlFileCreator;
use app\logic\MessageSqlFileCreator;
use app\logic\OpinionSqlFileCreator;
use app\logic\ReplySqlFileCreator;
use app\logic\TaskSqlFileCreator;
use app\logic\UserSqlFileCreator;

require_once 'vendor/autoload.php';

$creator = new CategorySqlFileCreator(__DIR__ . '/data/categories.csv');
$creator->execute();

$creator1 = new LocationSqlFileCreator(__DIR__ . '/data/cities.csv');
$creator1->execute();

$creator2 = new UserSqlFileCreator(__DIR__ . '/data/users.csv');
$creator2->execute();

$creator3 = new TaskSqlFileCreator(__DIR__ . '/data/tasks.csv');
$creator3->execute();

$creator4 = new MessageSqlFileCreator(__DIR__ . '/data/messages.csv');
$creator4->execute();

$creator5 = new OpinionSqlFileCreator(__DIR__ . '/data/opinions.csv');
$creator5->execute();

$creator6 = new ReplySqlFileCreator(__DIR__ . '/data/replies.csv');
$creator6->execute();
