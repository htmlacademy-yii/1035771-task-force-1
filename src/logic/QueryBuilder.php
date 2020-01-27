<?php


namespace app\logic;

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
        return "INSERT INTO categories (title, icon) VALUES ($doneAttributes);";
    }

    public function getSqlUser($attributes)
    {
        $doneAttributes = "'" . $attributes . "'";
        return "INSERT INTO users (email, `name`, password, creation_time) VALUES ($doneAttributes);";
    }

    public function getSqlLocation($attributes)
    {
        $doneAttributes = "'" . $attributes . "'";
        return "INSERT INTO locations (city, lat, `length`) VALUES ($doneAttributes);";
    }

    public function getSqlMessage($attributes)
    {
        $doneAttributes = "'" . $attributes . "'";
        return "INSERT INTO user_messages (creation_time, task_id, description) VALUES ($doneAttributes);";
    }

    public function getSqlOpinion($attributes)
    {
        $doneAttributes = "'" . $attributes . "'";
        return "INSERT INTO reviews (creation_time, score, description) VALUES ($doneAttributes);";
    }

    public function getSqlReply($attributes)
    {
        $doneAttributes = "'" . $attributes . "'";
        return "INSERT INTO proposals (creation_time, budget, description) VALUES ($doneAttributes);";
    }

    public function getSqlTask($attributes)
    {
        $doneAttributes = "'" . $attributes . "'";
        return "INSERT INTO tasks (creation_time, category_id, description, deadline, customer_id, location_id, budget, lat, long) VALUES ($doneAttributes);";
    }

}
