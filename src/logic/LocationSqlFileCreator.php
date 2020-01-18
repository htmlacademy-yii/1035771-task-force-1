<?php


namespace app\logic;

use SplFileObject;
class LocationSqlFileCreator
{
    private $filename;

    public function __construct($filename) {
        $this->filename = $filename;
    }

    public function execute() {
        $cat = new SplFileObject('data/cities.csv');
        $cat->setFlags(SplFileObject::READ_CSV | SplFileObject::READ_AHEAD | SplFileObject::SKIP_EMPTY | SplFileObject::DROP_NEW_LINE);
        $queryBuild = new QueryBuilder('locations');
        $header = $cat->fgetcsv();
        $firstRow = true;
        foreach ($cat as $row) {
            if ($firstRow) {
                $firstRow = false; continue;
            }
            $attributes = array_combine($header, $row);
            $sql = $queryBuild->getSqlLocation(implode('\', \'', $attributes));
            var_dump($sql);
        }
    }
}
