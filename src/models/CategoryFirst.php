<?php


namespace app\models;


class CategoryFirst
{
    private $title;
    private $icon;
    private $id;

    public function loadCsvArray(array $array)
    {
        $this->id = $array['category_id'];
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
