<?php


namespace app\logic;

use SplFileObject;
class TaskSqlFileCreator
{
    private $filename;

    public function __construct($filename) {
        $this->filename = $filename;
    }

    public function execute() {
        $cat = new SplFileObject('data/tasks.csv');
        $cat->setFlags(SplFileObject::READ_CSV | SplFileObject::READ_AHEAD | SplFileObject::SKIP_EMPTY | SplFileObject::DROP_NEW_LINE);
        $queryBuild = new QueryBuilder('tasks');
        $header = $cat->fgetcsv();
        $firstRow = true;
        foreach ($cat as $row) {
            if ($firstRow) {
                $firstRow = false; continue;
            }
            $attributes = array_combine($header, $row);
            $sql = $queryBuild->getSqlTask(implode('\', \'', $attributes));
            var_dump($sql);
        }
    }
}
