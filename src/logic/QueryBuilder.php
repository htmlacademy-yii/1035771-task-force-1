<?php


namespace app\logic;


use app\models\Category;

class QueryBuilder
{
    private $tableName;
    private $attribute;

    public function __construct(string $tableName)
    {
        $this->tableName = $tableName;
    }

    public function getSqlCategory($attributes)
    {
        return 'INSERT INTO categories (title, icon) VALUES ($attributes)';
    }

}
