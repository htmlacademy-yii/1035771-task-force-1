<?php


namespace app\logic;


/**
 * @method toArray()
 */
class CreateArray
{
    public $filename;
    public $result = [];

    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    /**
     * @param $filename
     */
    public function createArray($filename): void
    {

        if (($handle = fopen($filename, 'r')) !== false) {

            $header = fgetcsv($handle);
            while (($data = fgetcsv($handle)) !== false) {

                $line = array();

                foreach ($data as $value) {

                    $line = array_merge($line, str_getcsv($value, ';'));
                }
               print_r($this->result[] = $line);
            }
        }
    }

}

