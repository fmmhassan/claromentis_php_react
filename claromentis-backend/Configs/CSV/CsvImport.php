<?php
require "./Contracts/CSVImportContract.php";

class CsvImport implements CSVImportContract{
    private $file;
    
    private $fileMimes = [
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain'
    ];
    public function __construct($FILE) {
        $this->file = $FILE;
    }

    public function validateFile(){
        return (!empty($this->file['name']) && in_array($this->file['type'], $this->fileMimes));
    }

    public function readFile(){

        $csvFile = fopen($this->file['tmp_name'], 'r');
        // expenses
        $readArray = [];
        // Parse data from CSV file line by line
        while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE){
            //remove hiddent characters in excel
            $category = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $getData[0]);
            $unit_price = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $getData[1]);
            $qty = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $getData[2]);
            

            $readArray[] = [
                'category' => $category,
                'unit_price' => $unit_price,
                'qty' => $qty
            ];
        }
        // Close opened CSV file
        fclose($csvFile);
        return $readArray;
        
    }

}
?>