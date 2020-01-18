<?php
require_once 'vendor/autoload.php';
$array = [];
$array['category_number']=1;
$array['category_name']='test';
$array['category_code'] = 'repair';
// массив array  полиученный в результате парсинга строки из csv файла категорий.
$category = new \app\models\Category();
$category->loadCsvArray($array);
$attributes = $category->getAttributes();
$queryBuild = new \app\logic\QueryBuilder('categories', $attributes);
$sql = $queryBuild->getSql();

var_dump($sql);
