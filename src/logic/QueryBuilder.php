<?php


namespace app\logic;

use app\models\Category;
use app\models\Task;
use app\models\User;

class QueryBuilder
{

    public function getSqlCategory(Category $category) {
        return 'INSERT INTO categories (title, icon) VALUES ($category = $arraysForQueryBuilder)';
    }

    public function getSqlUser(User $arraysForQueryBuilder) {
        return 'INSERT INTO users (name, email, password, creation_time) VALUES ($arraysForQueryBuilder)';
    }

    public function getSqlTask(Task $arraysForQueryBuilder) {
        return 'INSERT INTO tasks (title, description, creation_time, deadline, budget, category_id, location_id) VALUES ($arraysForQueryBuilder)';
    }
}
