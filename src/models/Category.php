<?php


namespace app\models;

use app\logic\CreateArray;
class Category
{
    private $id;
    private $title;
    private $icon;

    public function loadCsvArray(array $array): void
    {
        $this->id = $array['category_number'];
        $this->title = $array['category_name'];
        $this->icon = $array['category_code'];
    }

    public function getAttributes()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'icon' => $this->icon,
        ];
    }
}

$arraysForQueryBuilder = [];
$csvParser = new CreateArray('data\categories.csv');


$arraysFromCsv = $csvParser->toArray();

foreach ($arraysFromCsv as $arrayFromCsv) {

    $category = new Category;
    $category->loadCsvArray($arrayFromCsv);
    $arraysForQueryBuilder[] = $category->getAttributes();
}
