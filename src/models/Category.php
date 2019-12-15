<?php


namespace app\models;


class Category
{
    private $id;
    private $title;
    private $icon;

    public function loadCsvArray(array $array)
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
