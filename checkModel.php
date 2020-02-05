<?php

use app\models\Category;

$cats = Category::findOne(2);
echo $id = $cats->id;
echo $icon =  $cats->icon;

