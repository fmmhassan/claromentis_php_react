<?php
require './Models/ExpenseModel.php';
require './Configs/CSV/CsvImport.php';
require './Configs/CSV/CsvExport.php';

class ExpenseController{
    private $ExpenseModel;
    public function __construct() {
        $this->ExpenseModel = new ExpenseModel;
    }

    public function import(){
        $CsvImport = new CsvImport($_FILES['file']);
        
        if ($CsvImport->validateFile()){
            
            $readValues = $CsvImport->readFile();
            $result = $this->ExpenseModel->insert($readValues);
            return $result;
        }
        else
        {
            return "Please select valid file";
        }
    }

    public function export(){
        $expenseSummaryData = $this->ExpenseModel->getGroupByCategory();//retrieve data for export
        $columnHeaders = ['Expense Category', 'Amount']; // column headers
        $filename = "expenses_" . date('Y-m-d-His') . ".csv"; //file name
        $CsvExport = new CSVExport($expenseSummaryData);

        $CsvExport->setColumnHeaders($columnHeaders)
        ->setFileName($filename)
        ->exportDataToCSV();
    }

    public function getExpensesSummary(){
        return $expenseSummaryData = $this->ExpenseModel->getGroupByCategory();//retrieve summary data
        
    }

}
?>