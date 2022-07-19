<?php
namespace Configs\CSV;
use Contracts\CSVImportContract;

class CsvImport implements CSVImportContract{
    private $file;
    
    private $csvFileType = [
        'text/csv'
    ];
    public function __construct($FILE) {
        $this->file = $FILE;
    }

    public function validateFile(){
        return (!empty($this->file['name']) && in_array($this->file['type'], $this->csvFileType));
    }

    public function readFile(){

        $csvFile = fopen($this->file['tmp_name'], 'r');
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