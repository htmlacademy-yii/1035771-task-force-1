<?php


namespace app\models;


use app\logic\CreateArray;

class Location
{
    private $id;
    private $city;
    private $lat;
    private $length;
    private $region;
    private $street;
    private $district;

    public function loadCsvArray(array $array): void
    {
        $this->id = $array['location_number'];
        $this->city = $array['location_city'];
        $this->lat = $array['location_lat'];
        $this->length = $array['location_length'];
        $this->region = $array['location_region'];
        $this->street = $array['location_street'];
        $this->district = $array['location_district'];
    }

    public function getAttributes()
    {
        return [
            'id' => $this->id,
            'city' => $this->city,
            'lat' => $this->lat,
            'length' => $this->length,
            'region' => $this->region,
            'street' => $this->street,
            'district' => $this->district
        ];
    }
}

$arraysForQueryBuilder = [];
$csvParser = new CreateArray('data\cities.csv');


$arraysFromCsv = $csvParser->toArray();

foreach ($arraysFromCsv as $arrayFromCsv) {

    $category = new Location;
    $category->loadCsvArray($arrayFromCsv);
    $arraysForQueryBuilder[] = $category->getAttributes();
}
