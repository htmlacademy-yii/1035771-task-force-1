<?php

use app\logic\CreateArray;
use app\models\Category;
use app\models\Location;
use app\models\Task;
use app\models\User;

require_once 'vendor/autoload.php';

$arraysForQueryBuilder = [];
$csvParser = new \app\logic\CreateArray('data\categories.csv');
$csvParser->createArray('data\categories.csv');

foreach ($csvParser as $arrayFromCsv) {
    $category = new Category();
    $category->loadCsvArray(explode(',', $arrayFromCsv));
    $attributes = $category->getAttributes();
    $queryBuild = new \app\logic\QueryBuilder('categories', $attributes);
    $sql = $queryBuild->getSql();
}
var_dump($category);
