<?php


namespace app\models;


use app\logic\CreateArray;

class File
{
    private $id;
    private $url;

    public function loadCsvArray(array $array): void
    {
        $this->id = $array['file_number'];
        $this->url = $array['file_url'];
    }

    public function getAttributes()
    {
        return [
            'id' => $this->id,
            'url' => $this->url
        ];
    }
}

$arraysForQueryBuilder = [];
$csvParser = new CreateArray('data\profiles.csv');


$arraysFromCsv = $csvParser->toArray();

foreach ($arraysFromCsv as $arrayFromCsv) {

    $category = new File;
    $category->loadCsvArray($arrayFromCsv);
    $arraysForQueryBuilder[] = $category->getAttributes();
}
