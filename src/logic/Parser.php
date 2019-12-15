<?php


namespace app\logic;


class Parser
{
    private $filename;
    /**
     * @param string $filename
     */
    public function __construct($filename) {
            $this->filename = $filename;
    }
    /**
     * @return array;
     */
    public function getCSV(): array
    {
        $handle = fopen($this->filename, "r");
        $header = fgetcsv($handle);
        $array_line_full = [];

        while (($line = fgetcsv($handle, 0, ";")) !== FALSE) {
            $array_line_full[] = array_filter($line);
        }
        return $array_line_full;
    }
}
