<?php


namespace app\logic;


class CreateArray
{
    public $filename;
    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }
    /**
     * @param $filename
     */
    public function createArray($filename)
    {
        if (($handle = fopen($filename, 'r')) !== false) {

            $header = fgetcsv($handle);
            while (($data = fgetcsv($handle)) !== false) {
                $line = [];

                foreach ($data as $key => $value) {
                    $line = array_merge($line, str_getcsv($value));
                }
               print_r(array_combine($header, $line));
            }
        }
    }
}
