<?php

use app\logic\CreateArray;
use app\models\Category;
use app\models\Location;
use app\models\Task;
use app\models\User;
use app\logic\QueryBuilder;

require_once 'vendor/autoload.php';

$cat = new SplFileObject('data\categories.csv');
$cat->setFlags(SplFileObject::READ_CSV | SplFileObject::READ_AHEAD | SplFileObject::SKIP_EMPTY | SplFileObject::DROP_NEW_LINE);
$queryBuild = new QueryBuilder('categories');
$handle = fopen('data\categories.csv', 'r');
$header = fgetcsv($handle);
foreach ($cat as $row) {
    $attributes = array_combine($header, $row);
    $sql = $queryBuild->getSqlCategory($attributes);
    var_dump($sql);
}

