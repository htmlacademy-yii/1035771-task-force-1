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
