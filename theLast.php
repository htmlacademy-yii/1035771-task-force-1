<?php

use app\logic\TheLast;

ini_set('display_errors', 'On');
error_reporting(E_ALL);
require_once 'vendor/autoload.php';

$loader = new \app\logic\CreateArray('data\categories.csv');

$loader ->createArray('data\categories.csv');
foreach ($loader as [$id, $title, $icon]) {
return $title;
}
