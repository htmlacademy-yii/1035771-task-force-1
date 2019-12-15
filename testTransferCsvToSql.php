<?php

use app\logic\CreateArray;
use app\models\Category;
use app\models\Location;
use app\models\Task;
use app\models\User;

require_once 'vendor/autoload.php';

$arraysForQueryBuilder = [];
$csvParser = new \app\logic\Parser('data\categories.csv');
$arraysFromCsv = $csvParser->getCSV();

foreach ($arraysFromCsv as $arrayFromCsv) {
    $category = new Category();
    $category->loadCsvArray($arrayFromCsv);
    $attributes = $category->getAttributes();
}
$queryBuild = new \app\logic\QueryBuilder('categories', $attributes);
$sql = $queryBuild->getSql();

print_r($sql);
