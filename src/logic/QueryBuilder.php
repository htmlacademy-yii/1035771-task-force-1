<?php


namespace app\logic;


use app\models\Category;

class QueryBuilder
{
    private $tableName;

    public function __construct(string $tableName)
    {
        $this->tableName = $tableName;
    }

    public function getSqlCategory($attributes)
    {
        $doneAttributes = "'" . $attributes . "'";
        return "INSERT INTO categories (title, icon) VALUES ($doneAttributes)";
    }
}
