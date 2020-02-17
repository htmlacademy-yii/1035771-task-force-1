<?php
require_once 'vendor\autoload.php';
use frontend\models\Category;
use frontend\controllers\CategoryController;
$cats = new CategoryController(2);
$cats ->actionIndex();

$cats = Category::findOne(2);

