<?php
declare(strict_types=1);

namespace app\logic;

use SplFileObject;

class TransferFormat
{
    public $filename;
    public $format = '';

    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    /**
     * @param $filename
     */
    public function transfer($filename): void
    {

        if (($handle = fopen($filename, 'r')) !== false) {

            $header = fgetcsv($handle);
            while (($data = fgetcsv($handle)) !== false) {

                $line = array();

                foreach ($data as $value) {

                    $line = array_merge($line, str_getcsv($value));
                }

                $format = "INSERT INTO categories (title, icon) VALUES (%s); ";
                printf($format, '"' . implode('","',$line) . '"');
            }
        }
    }
}

