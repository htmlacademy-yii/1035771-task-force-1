<?php
require_once 'vendor/autoload.php';

$verify = new \app\models\Category();
$one = $verify = \app\models\Category::findAll(['id'=> '1']);
var_dump($one);



