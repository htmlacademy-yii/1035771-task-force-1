<?php

use app\logic\CreateArray;
use app\models\Category;
use app\models\Task;

require_once 'vendor/autoload.php';
$load = new CreateArray('data\categories.csv');
$load->createArray('data\categories.csv');
