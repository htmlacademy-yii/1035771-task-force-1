<?php


namespace app\logic;


class QueryBuilder
{
    private $tableName;
    private $attributes;

    public function __construct(string $tableName, array $attributes)
    {
        $this->tableName = $tableName;
        $this->attributes = $attributes;
    }

    public function getSql() {
        $fieldsString =$this->getFieldsString();
        $valuesString = $this->getValuesString();
        return "INSERT INTO {$this->tableName} ($fieldsString) VALUES ($valuesString)";
    }

    private function getFieldsString() {
        $fields = array_keys($this->attributes);
        return implode(',', $fields);
    }

    private function getValuesString() {
        $values = [];
        foreach ($this->attributes as $value) {
            $values[] = "'". $value . "'";
        }
        return implode(',', $values);
    }
}
